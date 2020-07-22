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
            $table->unsignedBigInteger('father_id')->unsigned()->nullable();
            $table->unsignedBigInteger('mother_id')->unsigned()->nullable();
            $table->unsignedBigInteger('race_id')->unsigned()->nullable();
            $table->unsignedBigInteger('purpose_id')->unsigned()->nullable();
            $table->unsignedBigInteger('livestock_id')->unsigned()->nullable();
            $table->unsignedBigInteger('batche_id')->unsigned()->nullable();
            $table->date('birthday');
            $table->enum('gender', ['Macho', 'Hembra']);
            $table->string('name');
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
        Schema::dropIfExists('animals');
    }
}
