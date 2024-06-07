<?php

namespace Database\Factories;

use App\Models\Vehicule;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehiculeFactory extends Factory
{
    protected $model = Vehicule::class;

    public function definition()
    {
        return [
            'marque' => fake()->company,
            'modele' => fake()->word,
            'typeFuel' => fake()->randomElement(['Petrol', 'Diesel', 'Electric', 'Hybrid']),
            'registration' => strtoupper(fake()->unique()->bothify('??-###-??')),
            'image' => fake()->imageUrl(640, 480, 'transport', true, 'car'),
            'client_id' => Client::factory(), // Assumes you have a Client factory
        ];
    }
}
