<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileScenarioRatingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_scenarioratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('scenario_id');
            $table->double('rating')->default(0);
            $table->double('kfactor')->default(0);
            $table->integer('attempt')->default(0);
            $table->double('uncertainty')->default(0);
            $table->double('count')->default(0);
            $table->dateTime('lastplaytime');

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
        Schema::dropIfExists('profile_scenarioratings');
    }
}
