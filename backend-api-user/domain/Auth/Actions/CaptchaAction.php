<?php

namespace Domain\Auth\Actions;

use Illuminate\Support\Facades\Http;

class CaptchaAction
{
    public function __invoke(?string $captcha): bool
    {
        if (!app()->environment('production')) {
            return true;
        }

        $captchaResponse = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret'   => env('RECAPTCHA_SECRET_KEY'),
                'response' => $captcha,
            ]
        )->json();

        return $captchaResponse['success'] ?? false;
    }
}
