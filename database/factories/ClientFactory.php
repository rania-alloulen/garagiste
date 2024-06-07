<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    protected $model = Client::class;

    public function definition()
    {
        return [
            'nom' => fake()->lastName,
            'prenom' => fake()->firstName,
            'adresse' => fake()->address,
            'telephone' => fake()->phoneNumber,
            'user_id' => User::factory()->create()->id, // Assumes you have a User factory
        ];
    }
}
