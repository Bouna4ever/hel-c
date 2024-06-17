<?php

namespace App\Providers;

use App\Models\Profil;
use App\Policies\ProfilPolicy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
        Profil::class => ProfilPolicy::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
