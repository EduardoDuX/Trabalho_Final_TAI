<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
      AviaoSeeder::class,
      ClienteSeeder::class,
      PassagemSeeder::class,
      VooSeeder::class
  ]);
    }
}
