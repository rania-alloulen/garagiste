<?php

namespace Database\Factories;

use App\Models\Mecanicien;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MecanicienFactory extends Factory
{
    protected $model = Mecanicien::class;

    public function definition()
    {
        return [
            'nom' => fake()->lastName,
            'prenom' =>fake()->firstName,
            'adresse' => fake()->address,
            'telephone' => fake()->phoneNumber,
            'user_id' => User::factory()->create()->id, // Assumes you have a User factory
        ];
    }
}
