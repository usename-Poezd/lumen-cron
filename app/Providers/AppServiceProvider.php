<?php

namespace App\Providers;

use App\Models\Gene;
use App\Models\Trait_;
use App\Observers\GeneObserver;
use App\Observers\TraitObserver;
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

    public function boot()
    {
    }
}
