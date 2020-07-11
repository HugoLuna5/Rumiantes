<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('animals', function (Blueprint $table) {

            $table->foreign('livestock_id')->references('id')->on('livestocks');
            $table->foreign('batche_id')->references('id')->on('batches');
            $table->foreign('purpose_id')->references('id')->on('purposes');
            $table->foreign('race_id')->references('id')->on('races');
            // $table->foreign('father_id')->references('no_animal')->on('animals');
            // $table->foreign('mother_id')->references('no_animal')->on('animals');
            $table->foreign('animal_relation_stage_weights_id')->references('id')->on('animal_relation_stage_weights');
        });


        Schema::table('raw_material_diets', function (Blueprint $table) {
            $table->foreign('diet_id')->references('id')->on('diets');
            $table->foreign('raw_material_id')->references('id')->on('raw_materials');


        });


        Schema::table('animal_relation_stage_weights', function (Blueprint $table) {
            //$table->foreign('animal_no')->references('no_animal')->on('animals');
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
        //
    }
}
