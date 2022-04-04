<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('display_name');
            $table->longText('description')->nullable();
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('leagues', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('sport_id');
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();
            $table->longText('description')->nullable();
            $table->string('reglamento_path')->nullable();
            $table->json('schedule')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        Schema::create('referee_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('display_name');
            $table->longText('description')->nullable();
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();
            $table->unsignedBigInteger('sport_id');
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('referees', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('league_id');
            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');  
            $table->integer('edad');
            $table->float('estatura');
            $table->float('peso');
            $table->string('licencia')->nullable();
            $table->unsignedBigInteger('refereeType_id');
            $table->foreign('refereeType_id')->references('id')->on('referee_types')->onDelete('cascade');
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });


        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('display_name');
            $table->longText('description')->nullable();
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->unsignedBigInteger('league_id');
            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');  
            $table->string('name')->nullable();
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();
            $table->integer('number_teams')->nullable();
            $table->string('gameday')->nullable();
            $table->integer('number_periods')->nullable();
            $table->integer('period_lenght')->nullable();
            $table->integer('time_offs')->nullable();
            $table->integer('extra_time_periods')->nullable();
            $table->integer('extra_time')->nullable();
            $table->boolean('is_extra_time')->nullable();
            $table->integer('number_teams_playoffs')->nullable();
            $table->longText('description')->nullable();
            $table->string('reglamento_path')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->unsignedBigInteger('league_id');
            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');            
            $table->string('name');
            $table->string('display_name');
            $table->longText('description')->nullable();
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('tipo_estadio')->nullable();
            $table->float('lat')->nullable();
            $table->float('long')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('display_name');
            $table->longText('description')->nullable();
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->string('name');
            $table->string('display_name');
            $table->longText('description')->nullable();
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
            $table->unsignedBigInteger('material_id');
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('league_id');
            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->integer('numero')->nullable();
            $table->string('apodo')->nullable();
            $table->string('posicion')->nullable();
            $table->integer('edad')->nullable();
            $table->float('estatura')->nullable();
            $table->float('peso')->nullable();
            $table->boolean('is_active')->default(1);
            $table->boolean('is_captain');
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();
            $table->timestamps();
        });

        Schema::create('modalities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('display_name');
            $table->longText('description')->nullable();
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();

            $table->unsignedBigInteger('modality_id');
            $table->foreign('modality_id')->references('id')->on('modalities')->onDelete('cascade');

            $table->unsignedBigInteger('tournament_id')->nullable();
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');

            $table->unsignedBigInteger('field_id')->nullable();
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');

            $table->datetime('start_time')->nullable();
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();

            $table->integer('ronda')->nullable();
            $table->boolean('is_free')->nullable()->default(false);
            $table->boolean('is_finished')->default(false);
            $table->timestamps();
            $table->softDeletes();
    
        });

        Schema::create('team_game', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->string('score')->nullable();
            $table->timestamps();
        });

        Schema::create('game_referee', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->unsignedBigInteger('referee_id');
            $table->foreign('referee_id')->references('id')->on('referees')->onDelete('cascade');
            $table->string('position')->nullable();
            $table->timestamps();
        });

        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->integer('value');
            $table->string('time');
            $table->integer('period');
            $table->timestamps();
        });

        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->string('time');
            $table->integer('period');
            $table->timestamps();
        });

        Schema::create('team_tournament', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tournament_id');
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->integer('position')->nullable();
            $table->integer('jugados')->default(0);
            $table->integer('ganados')->default(0);
            $table->integer('perdidos')->default(0);
            $table->integer('empates')->default(0);            
            $table->integer('puntos_favor')->default(0);            
            $table->integer('puntos_contra')->default(0);            
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_tournament');
        Schema::dropIfExists('actions');
        Schema::dropIfExists('scores');
        Schema::dropIfExists('game_referee');
        Schema::dropIfExists('team_game');
        Schema::dropIfExists('games');
        Schema::dropIfExists('modalities');
        Schema::dropIfExists('players');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('fields');
        Schema::dropIfExists('materials');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('tournaments');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('referees');
        Schema::dropIfExists('referee_types');
        Schema::dropIfExists('leagues');
        Schema::dropIfExists('sports');
    }
}

