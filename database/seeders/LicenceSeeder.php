<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LicenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('licences')->insert([
            [
                'plan' => 'Essentiel',
                'prix_mensuel' => 2000, // Remplacez par le prix souhaité
                'description' => 'Plan Essentiel offrant les fonctionnalités de base.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'plan' => 'Standard',
                'prix_mensuel' => 3500, // Remplacez par le prix souhaité
                'description' => 'Plan Standard offrant des fonctionnalités avancées.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
