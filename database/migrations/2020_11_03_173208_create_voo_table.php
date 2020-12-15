<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVooTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voo', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->string('local_partida');
            $table->string('local_destino');
            $table->date('data_partida');
            $table->date('data_chegada');
            $table->time('hora_partida');
            $table->time('hora_chegada');
            $table->foreignId('aviao_id')->constrained('aviao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voo_models');
    }
}
