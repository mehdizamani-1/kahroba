<?php

namespace App\Providers;

use App\Models\Config;
use App\Models\WidgetLink;
use Illuminate\Support\Facades\View;
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

        View::composer('dashboard.*', function ($view) {

            $widgetLinks = WidgetLink::query()
                ->where('active',1)
                ->get();
            $user = auth()->user();




            session('widgetLinks', $widgetLinks) ;
            $setting = Config::all() ;


            $base_url = \Illuminate\Support\Facades\Config::get('app.base_url');
            View::share([
                'widgetLinks' => $widgetLinks,
                'setting' => $setting,
                'base_url' => $base_url,
            ]) ;

        }) ;

    }
}
