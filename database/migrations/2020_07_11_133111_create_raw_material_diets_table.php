<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawMaterialDietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_material_diets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('raw_material_id')->unsigned();
            $table->bigInteger('diet_id')->unsigned();
            $table->timestamps();

            $table->foreign('diet_id')->references('id')->on('diets');
            $table->foreign('raw_material_id')->references('id')->on('raw_materials');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('raw_material_diets');
    }
}
