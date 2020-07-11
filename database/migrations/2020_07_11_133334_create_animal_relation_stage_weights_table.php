<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalRelationStageWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_relation_stage_weights', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('animal_no')->unsigned();
            $table->bigInteger('stage_id')->unsigned();
            $table->bigInteger('weight_id')->unsigned();
            $table->bigInteger('diet_id')->unsigned();
            $table->bigInteger('weight_to_gain_id')->unsigned();
            $table->date('date_gain_weight')->unsigned();
            $table->timestamps();

            $table->foreign('animal_no')->references('no_animal')->on('animals');
            $table->foreign('stage_id')->references('id')->on('stages');
            $table->foreign('weight_id')->references('id')->on('weights');
            $table->foreign('diet_id')->references('id')->on('diets');
            $table->foreign('weight_to_gain_id')->references('id')->on('weights');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal_relation_stage_weights');
    }
}
