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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('edad');
            $table->float('estatura');
            $table->float('peso');
            $table->integer('is_active');
            $table->unsignedBigInteger('refereeType_id');
            $table->foreign('refereeType_id')->references('id')->on('referee_types')->onDelete('cascade');
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();
            $table->timestamps();
        });



        Schema::create('leagues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('sport_id');
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();
            $table->integer('numero_equipos')->nullable();
            $table->longText('description')->nullable();
            $table->string('reglamento_path')->nullable();
            $table->json('schedule')->nullable();
            $table->timestamps();
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->id();
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
            $table->float('lat')->nullable();
            $table->float('long')->nullable();
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
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('league_id');
            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();
            $table->timestamps();
        });

        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->integer('numero');
            $table->integer('edad');
            $table->float('estatura');
            $table->float('peso');
            $table->integer('is_active');
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();
            $table->timestamps();
        });

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('display_name');
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('sport_id');
            $table->foreign('sport_id')->references('id')->on('sports')->onDelete('cascade');
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
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

            $table->unsignedBigInteger('modality_id');
            $table->foreign('modality_id')->references('id')->on('modalities')->onDelete('cascade');

            $table->unsignedBigInteger('league_id');
            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');

            $table->unsignedBigInteger('field_id');
            $table->foreign('field_id')->references('id')->on('fields')->onDelete('cascade');

            $table->datetime('start_time')->nullable();
            $table->integer('result')->nullable();
            $table->string('icon_path')->nullable();
            $table->string('img_path')->nullable();

            $table->timestamps();
            $table->softDeletes();
    
        });

        Schema::create('team_game', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('game_referee', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->unsignedBigInteger('referee_id');
            $table->foreign('referee_id')->references('id')->on('referees')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->integer('value');
            $table->time('eventTime', $precision = 0);
            $table->timestamps();
        });

        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
            $table->unsignedBigInteger('player_id');
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->time('eventTime', $precision = 0);
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
        Schema::dropIfExists('actions');
        Schema::dropIfExists('scores');
        Schema::dropIfExists('game_referee');
        Schema::dropIfExists('team_game');
        Schema::dropIfExists('games');
        Schema::dropIfExists('modalities');
        Schema::dropIfExists('events');
        Schema::dropIfExists('players');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('fields');
        Schema::dropIfExists('materials');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('leagues');
        Schema::dropIfExists('referees');
        Schema::dropIfExists('refereeTypes');
        Schema::dropIfExists('sports');
    }
}
