<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
=======
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\GoogleProvider;
>>>>>>> zunadeafiturv1

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
<<<<<<< HEAD
        //
=======
        error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
        $this->configureCertificateAuthority();
>>>>>>> zunadeafiturv1
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
<<<<<<< HEAD
        //
=======
        error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);

        Socialite::extend('google', function () {
            $caBundle = storage_path('app/cacert.pem');

            return new GoogleProvider(
                request(),
                config('services.google.client_id'),
                config('services.google.client_secret'),
                config('services.google.redirect'),
                is_file($caBundle) ? ['verify' => $caBundle] : []
            );
        });
    }

    private function configureCertificateAuthority(): void
    {
        $caBundle = storage_path('app/cacert.pem');

        if (! is_file($caBundle)) {
            return;
        }

        ini_set('curl.cainfo', $caBundle);
        ini_set('openssl.cafile', $caBundle);
        putenv('CURL_CA_BUNDLE=' . $caBundle);
        putenv('SSL_CERT_FILE=' . $caBundle);
>>>>>>> zunadeafiturv1
    }
}
