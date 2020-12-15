<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('cliente')->insert(["nome" => "Rogério", "telefone" => "1111-2222", "cpf" => "123.456.789-10", "email" => "rogerio@email.com"]);
      DB::table('cliente')->insert(["nome" => "Eduardo", "telefone" => "2222-3333", "cpf" => "124.456.789-11", "email" => "eduardo@email.com"]);
      DB::table('cliente')->insert(["nome" => "Amanda", "telefone" => "3333-4444", "cpf" => "125.456.789-12", "email" => "amanda@email.com"]);
    }
}
