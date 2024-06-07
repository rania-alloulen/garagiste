<?php

namespace Database\Factories;

use App\Models\Facture;
use App\Models\Reparation;
use Illuminate\Database\Eloquent\Factories\Factory;

class FactureFactory extends Factory
{
    protected $model = Facture::class;

    public function definition()
    {
        return [
            'reparation_id' => Reparation::factory()->create()->id, // Assumes you have a Reparation factory
            'chargeSupp' => fake()->optional()->randomFloat(2, 0, 1000), // Optional additional charge
            'montant' => fake()->randomFloat(2, 100, 5000), // Amount
        ];
    }
}
