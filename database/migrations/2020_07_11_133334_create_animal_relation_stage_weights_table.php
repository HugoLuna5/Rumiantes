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
            $table->unsignedBigInteger('animal_no')->unsigned()->nullable();
            $table->unsignedBigInteger('stage_id')->unsigned()->nullable();
            $table->unsignedBigInteger('weight_id')->unsigned()->nullable();
            $table->unsignedBigInteger('diet_id')->unsigned()->nullable();
            $table->unsignedBigInteger('weight_to_gain_id')->unsigned()->nullable();
            $table->date('date_gain_weight');
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
        Schema::dropIfExists('animal_relation_stage_weights');
    }
}
