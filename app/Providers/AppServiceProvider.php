<?php

namespace App\Providers;

use App\Models\Listing;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['listings.show', 'components/layout'], function ($view) {
            $site_id = Route::current()->parameter('id');

            if ($site_id != '') {
                $listing = Listing::where('id', $site_id)->firstOrFail();
            } else {
                $listing = '';
            }

            $view->with(['listing' => $listing]);
        });
    }
}
