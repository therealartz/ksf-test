<?php

namespace App\Providers;

use App\Contracts\PhoneValidationServiceInterface;
use App\Services\NumValidateService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PhoneValidationServiceInterface::class, function () {
            $numVerifyKey = config('third-party.numverify_key');
            if (is_null($numVerifyKey)) {
                throw new \Exception('Numvify API key must be set in .env. https://numverify.com');
            }

            return new NumValidateService($numVerifyKey);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
