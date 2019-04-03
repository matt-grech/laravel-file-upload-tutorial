<?php

namespace App\Providers\Logo;

use Illuminate\Support\ServiceProvider;
use App\Services\Logo\Classes\CreateLogoService;
use App\Services\Logo\Interfaces\CreateLogoServiceInterface;
use App\Writes\LogoWrite;

class CreateLogoServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap services.
     *
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register services.
     *
     */
    public function register(): void
    {
        $this->app->bind(CreateLogoServiceInterface::class, function($app) {
                return new CreateLogoService(
                    $app->make(LogoWrite::class)
                );
        });
    }
}
