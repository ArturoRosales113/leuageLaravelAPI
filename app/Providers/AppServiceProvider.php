<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Sport;
use App\Models\League;
use App\Models\Location;
use App\Models\Material;
use App\Models\Team;
use App\Models\RefereeType;

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
        Schema::defaultStringLength(191);

        view()->composer('dashboard.leagues.create', function ($view) {
            $view->with('sports' , Sport::all());
        });
        view()->composer('dashboard.leagues.edit', function ($view) {
            $view->with('sports' , Sport::all());
        });

        view()->composer('dashboard.teams.create', function ($view) {
            $view->with('leagues' , League::all());
        });
        view()->composer('dashboard.teams.edit', function ($view) {
            $view->with('leagues' , League::all());
        });

        view()->composer('dashboard.events.create', function ($view) {
            $view->with('sports' , Sport::all());
        });

        view()->composer('dashboard.locations.create', function ($view) {
            $view->with('leagues' , League::all());
        });

        view()->composer('dashboard.fields.create', function ($view) {
            $view->with('locations' , Location::all());
        });

        view()->composer('dashboard.fields.create', function ($view) {
            $view->with('materials' , Material::all());
        });

        view()->composer('dashboard.players.create', function ($view) {
            $view->with('teams' , Team::all());
        });

        view()->composer('dashboard.referees.create', function ($view) {
            $view->with('refereeTypes' , RefereeType::all());
        });

        view()->composer('dashboard.refereeTypes.create', function ($view) {
            $view->with('sports' , Sport::all());
        });

    }
}
