<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->bigInteger('no_animal')->unique()->primary();
            $table->bigInteger('father_id')->unsigned();
            $table->bigInteger('mother_id')->unsigned();
            $table->bigInteger('race_id')->unsigned();
            $table->bigInteger('purpose_id')->unsigned();
            $table->bigInteger('livestock_id')->unsigned();
            $table->bigInteger('batche_id')->unsigned();
            $table->bigInteger('animal_relation_stage_weights_id')->unsigned();
            $table->date('birthday');
            $table->enum('gender', ['Macho', 'Hembra']);
            $table->string('name');
            $table->timestamps();


            $table->foreign('livestock_id')->references('id')->on('livestocks');
            $table->foreign('batche_id')->references('id')->on('batches');
            $table->foreign('purpose_id')->references('id')->on('purposes');
            $table->foreign('race_id')->references('id')->on('races');
            $table->foreign('father_id')->references('no_animal')->on('animals');
            $table->foreign('mother_id')->references('no_animal')->on('animals');
            $table->foreign('animal_relation_stage_weights_id')->references('id')->on('animal_relation_stage_weights');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
