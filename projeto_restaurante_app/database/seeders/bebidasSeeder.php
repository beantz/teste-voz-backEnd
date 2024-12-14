<?php

namespace Database\Seeders;

use App\Models\bebidas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class bebidasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        bebidas::create(['nome' => 'agua com gás', 'preço' => 6.50]);
        bebidas::create(['nome' => 'limoneto', 'preço' => 6.50]);

        //\App\Models\bebidas::factory()->count(30)->create();

    }
}
