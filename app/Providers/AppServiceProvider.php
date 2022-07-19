<?php

namespace App\Providers;
use App\Models\ClassSection;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Auth;


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
        //dd(Auth()->id());
        view()->composer('include.header', function ($view)
        {
            $view->with('profieData', User::where('id',Auth()->id())->first());
            $view->with('school', School::first());
            $view->with('form_master', ClassSection::where('emp_Id',Auth()->id())->first());
        });
    }
}
