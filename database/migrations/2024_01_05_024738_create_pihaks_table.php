<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePihaksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pihaks', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_putra');
            $table->integer('jumlah_putri');
            $table->integer('jumlah_pengurus');
            $table->integer('jumlah_alumni');
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
        Schema::dropIfExists('pihaks');
    }
}
