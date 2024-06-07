<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Facture;
use App\Models\Reparation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        //  \App\Models\User::factory()->create([
        //      'name' => 'admin',
        //      'email' => 'admin@gmail.com',
        //      'password'=>'123456789',
        //      'role'=>'admin'
        // ]);
        // \App\Models\Mecanicien::factory(10)->create(); // create 10 mecaniciens
        \App\Models\Vehicule::factory(10)->create(); // create 10 vehicules
        // Reparation::factory(50)->create(); // create 50 reparations
        Facture::factory(50)->create();
    }
}
