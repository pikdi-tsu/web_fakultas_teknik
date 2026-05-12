<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Contact;
use App\Models\Help;

class AppServiceProvider extends ServiceProvider
{
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
        View::composer('components.layouts.footer', function ($view) {
            $view->with('contacts', Contact::all());
        });
        View::composer('components.layouts.help', function ($view) {
            $view->with('helps', Help::all());
        });
    }
}
