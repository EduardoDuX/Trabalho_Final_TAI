<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassagemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passagem', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('codigo');
            $table->foreignId('cliente_id')->constrained('cliente');
            $table->foreignId('voo_id')->constrained('voo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('passagem_models');
    }
}
