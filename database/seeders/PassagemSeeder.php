<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PassagemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('passagem')->insert(["codigo" => "AV500", "cliente_id" => "1", "voo_id" => "1"]);
      DB::table('passagem')->insert(["codigo" => "BV250", "cliente_id" => "2", "voo_id" => "2"]);
      DB::table('passagem')->insert(["codigo" => "CV450", "cliente_id" => "3", "voo_id" => "3"]);
    }
}
