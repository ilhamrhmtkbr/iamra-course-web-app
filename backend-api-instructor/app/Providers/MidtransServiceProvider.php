<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class MidtransServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Http::macro('midTransCreator', function ()
        {
            return Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode(config('midtrans.creatorKey') . ':'),
                'X-Idempotency-Key' => uniqid(),
            ])->baseUrl(config('midtrans.url') . 'iris');
        });

        Http::macro('midTransApprove', function () {
            return Http::withHeaders([
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Basic ' . base64_encode(config('midtrans.approverKey') . ':'),
                'X-Idempotency-Key' => uniqid(),
            ])->baseUrl(config('midtrans.url') . 'iris');
        });
    }
}
