<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Sport;
use App\Models\League;
use App\Models\Location;
use App\Models\Material;
use App\Models\Modalitie;
use App\Models\Team;
use App\Models\RefereeType;
use App\Models\Referee;
use App\Models\Game;
use App\Models\Tournament;
use App\Models\Category;
use App\Models\Field;


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

        view()->composer('dashboard.locations.edit', function ($view) {
            $view->with('leagues' , League::all());
        });

        view()->composer('dashboard.locations.index', function ($view) {
            $view->with('materials' , Material::all());
        });

        view()->composer('dashboard.fields.createForm', function ($view) {
            $view->with('materials' , Material::all());
        });

        view()->composer('dashboard.tournaments.createForm', function ($view) {
            $view->with([
                'categories' => Category::all(),
                'leagues' => League::all(), 
            ]);
        });
        view()->composer('dashboard.tournaments.create', function ($view) {
            $view->with([
                'categories' => Category::all(),
                'leagues' => League::all(), 
            ]);
        });
        view()->composer('dashboard.tournaments.edit', function ($view) {
            $view->with([
                'categories' => Category::all(),
                'leagues' => League::all(), 
            ]);
        });

        view()->composer('dashboard.games.createForm', function ($view) {
            $view->with([
                'referees' => Referee::all(),
                'modalities' => Modalitie::all(),
                'tournaments' => Tournament::all()
            ]);
        });

        view()->composer('dashboard.games.edit', function ($view) {
            $view->with([
                'leagues' => League::all(),
                'fields' => Field::all(),
                'referees' => Referee::all(),
                'modalities' => Modalitie::all(),
                'tournaments' => Tournament::all()
            ]);
        });

        view()->composer('dashboard.fields.edit', function ($view) {
            $view->with('materials' , Material::all());
        });

        view()->composer('dashboard.players.create', function ($view) {
            $view->with('teams' , Team::all());
        });

        view()->composer('dashboard.players.edit', function ($view) {
            $view->with('teams' , Team::all());
        });

        view()->composer('dashboard.referees.create', function ($view) {
            $view->with([
                'refereeTypes' => RefereeType::all(),
                'leagues' => League::all(), 
            ]);
        });

        view()->composer('dashboard.referees.index', function ($view) {
            $view->with([
                'refereeTypes' => RefereeType::all(),
                'leagues' => League::all(), 
            ]);
        });

        view()->composer('dashboard.referees.edit', function ($view) {
            $view->with([
                'refereeTypes' => RefereeType::all(),
                'leagues' => League::all(), 
            ]);
        });

        view()->composer('dashboard.refereeTypes.create', function ($view) {
            $view->with('sports' , Sport::all());
        });

        view()->composer('dashboard.refereeTypes.edit', function ($view) {
            $view->with('sports' , Sport::all());
        });

    }
}
