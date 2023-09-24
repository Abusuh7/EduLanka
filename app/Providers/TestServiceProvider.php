<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {


        view()->composer('auth.register', function ($view) {
            $view->with([
                'user' => auth()->check() ? auth()->user() : null,
                'location' => [1, 2, 3, 4]
            ]);
        });


    }
}
