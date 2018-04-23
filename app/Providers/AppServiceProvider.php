<?php

namespace App\Providers;

use App\Ad;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $menuAd = Ad::where('name', 'menu')->first();
        $ads = Ad::all();
        $banner = Ad::where('name', 'banner')->first();

        view()->share(compact('menuAd', 'ads', 'banner'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
