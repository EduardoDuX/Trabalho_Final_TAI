<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VooSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('voo')->insert(["nome" => "Chapecó - São Paulo", "local_partida" => "Chapecó", "local_destino" => "São Paulo", "data_partida" => "2020-11-10", "data_chegada" => "2020-11-11", "hora_partida" => "20:00:00", "hora_chegada" => "04:00:00", "aviao_id" => "1"]);
      DB::table('voo')->insert(["nome" => "São Paulo - Londres", "local_partida" => "São Paulo", "local_destino" => "Londres", "data_partida" => "2020-11-13", "data_chegada" => "2020-11-14", "hora_partida" => "20:00:00", "hora_chegada" => "05:00:00", "aviao_id" => "2"]);
      DB::table('voo')->insert(["nome" => "Londres - Paris", "local_partida" => "Londres", "local_destino" => "Paris", "data_partida" => "2020-11-14", "data_chegada" => "2020-11-15", "hora_partida" => "20:00:00", "hora_chegada" => "02:00:00", "aviao_id" => "3"]);
    }
}
