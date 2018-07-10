<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrediksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prediksis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Kehadiran');
            $table->string('Tugas');
            $table->string('UTS');
            $table->string('UAS');
            $table->string('Nilai');
            $table->string('Target');
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
        Schema::dropIfExists('prediksis');
    }
}
