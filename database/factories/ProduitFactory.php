<?php

namespace Database\Factories;

use App\Models\Produit;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => $this->faker->words(2, true),
            'price' => $this->faker->randomFloat(2, 5, 500),
            'stock' => $this->faker->numberBetween(0, 100),
            'category' => $this->faker->word(),
            'description' => $this->faker->sentence()
        ];
    }
}
