<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Genre;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //    
    }

    public function boot(): void
    {
        View::composer(['movies.create', 'movies.update'],  function ($view) {
            $view->with('genries', Genre::all());
        });
    }
}
