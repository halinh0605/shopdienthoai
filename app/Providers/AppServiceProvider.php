<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\danhmuc;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('pages.sanpham',function ($view){
            $loai_sp = danhmuc::all();
            $view->with('loai_sp',$loai_sp);
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
