<?php

namespace Domain\Auth\Actions;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CaptchaAction
{
    private string $googleApiKey;
    private string $googleProjectId;
    private string $googleRecaptchaV2SecretKey;
    private string $googleRecaptchaEnterpriseSiteKey;

    public function __construct()
    {
        $this->googleApiKey = config('api.google.api_key');
        $this->googleProjectId = config('api.google.project_id');
        $this->googleRecaptchaV2SecretKey = config('api.google.recaptcha_v2_secret_key');
        $this->googleRecaptchaEnterpriseSiteKey = config('api.google.recaptcha_enterprise_site_key');
    }

    public function __invoke(?string $captcha, string $type = 'v2'): bool 
    {
        // if (!app()->environment('production')) {
        //     return true;
        // }
        
        if(empty($captcha)) {
            return false;
        }

        try {
            if ($type === 'enterprise') {
                return $this->verifyEnterprise($captcha);
            } else {
                return $this->verifyV2($captcha);
            }
        } catch (\Exception $e) {
            Log::error('Captcha verification error: ' . $e->getMessage());
            return false;
        }
    }

    private function verifyV2(?string $captcha): bool
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $this->googleRecaptchaV2SecretKey,
            'response' => $captcha,
        ]);

        $result = $response->json();
        
        Log::info('reCAPTCHA v2 verification', [
            'success' => $result['success'] ?? false,
            'score' => $result['score'] ?? null,
        ]);

        return $result['success'] ?? false;
    }

    private function verifyEnterprise(string $captcha): bool
    {
        $url = "https://recaptchaenterprise.googleapis.com/v1/projects/{$this->googleProjectId}/assessments?key={$this->googleApiKey}";
        
        $response = Http::post($url, [
            'event' => [
                'token' => $captcha,
                'siteKey' => $this->googleRecaptchaEnterpriseSiteKey,
                'expectedAction' => 'LOGIN', // sesuaikan dengan action di Android
            ]
        ]);

        $result = $response->json();
        
        // reCAPTCHA Enterprise menggunakan score (0.0 - 1.0)
        // 0.0 = kemungkinan bot, 1.0 = kemungkinan manusia
        $score = $result['riskAnalysis']['score'] ?? 0;
        $valid = $result['tokenProperties']['valid'] ?? false;
        
        Log::info('reCAPTCHA Enterprise verification', [
            'valid' => $valid,
            'score' => $score,
            'reasons' => $result['riskAnalysis']['reasons'] ?? [],
        ]);

        // Threshold bisa disesuaikan (misal 0.5 atau 0.7)
        return $valid && $score >= 0.5;
    }
}