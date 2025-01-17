<?php

namespace Database\Factories;

use App\Models\Produtos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produtos>
 */
class ProdutosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        //usei arrays para popular meu banco de dados
        $carnesBovinas = [
            "jaca", "manga", "alface", "cebola", "tomate",
            "banana", "melancia"
        ];

        return [
            
            'nome' => $this->faker->randomElement($carnesBovinas). ' ' .$this->faker->word(),
            'descricao' => $this->faker->sentence(),
            'preco' => $this->faker->randomFloat(1, 2, 100),
            'categoria_id' => 6,

        ];

    }

}
