<?php

namespace App\Providers;

use App\Models\Label;
use App\Models\Location;
use App\Models\Product;
use App\Models\Section;
use App\Observers\LabelObserver;
use App\Observers\LocationObserver;
use App\Observers\SectionObserver;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        // Register model observers
        Label::observe(LabelObserver::class);
        Location::observe(LocationObserver::class);
        Section::observe(SectionObserver::class);
        // Register morph map for relations
        Relation::morphMap([
            'location' => Location::class,
            'product' => Product::class,
        ]);
        // Register blade component to handle breadcrumbs
        Blade::component('components.breadcrumbs', 'breadcrumbs');
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
