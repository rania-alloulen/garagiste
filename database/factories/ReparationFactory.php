<?php

namespace Database\Factories;

use App\Models\Reparation;
use App\Models\Mecanicien;
use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ReparationFactory extends Factory
{
    protected $model = Reparation::class;

    public function definition()
    {
        return [
            'description' => fake()->paragraph,
            'status' => fake()->randomElement(['en cours', 'en attente', 'terminer']),
            'startDate' => fake()->date,
            'endDate' => fake()->date,
            'mechanicNotes' => fake()->sentence,
            'clientNotes' => fake()->sentence,
            'mecanic_id' => Mecanicien::factory(), // Assumes you have a Mecanicien factory
            'vehicule_id' => Vehicule::factory()->nullable(), // Assumes you have a Vehicule factory
        ];
    }
}
