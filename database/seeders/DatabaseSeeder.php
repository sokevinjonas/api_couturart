<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\LicenceSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nom' => 'Jonas SO',
            'email' => 'sokevin7@gmail.com',
            'password' => Hash::make("Mrlarson@1217"),
            'telephone' => "56785580",
            'pays' => "+226",
            'role' => 'admin'
        ]);

        $this->call([
            LicenceSeeder::class,
        ]);
    }
    
}
