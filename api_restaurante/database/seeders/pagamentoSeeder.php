<?php

namespace Database\Seeders;

use App\Models\pagamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        pagamento::create(['nome' => 'Dinheiro']);
        pagamento::create(['nome' => 'Pix']);
        pagamento::create(['nome' => 'Cartao']);
    }
}
