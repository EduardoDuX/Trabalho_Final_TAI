<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AviaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('aviao')->insert(["nome" => "Atlanta", "numero_serial" => "A5500", "modelo" => "Boeing", "marca" => "BoeingAirplanes", "capacidade" => "300"]);
      DB::table('aviao')->insert(["nome" => "Bird01", "numero_serial" => "B1400", "modelo" => "Monomotor", "marca" => "BirdAirplanes", "capacidade" => "25"]);
      DB::table('aviao')->insert(["nome" => "Bird02", "numero_serial" => "B1220", "modelo" => "Monomotor", "marca" => "BirdAirplanes", "capacidade" => "1"]);
    }
}
