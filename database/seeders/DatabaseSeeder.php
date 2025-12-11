<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'id' => 1,
            'name' => 'Refqi Hardiansyah',
            'email' => 'refqi@gmail.com',
            'password' => bcrypt('12341234'),
        ]);
        
        User::factory()->create([
            'id' => 2,
            'name' => 'Dian',
            'email' => 'dian@gmail.com',
            'password' => bcrypt('12341234'),
        ]);

        Barang::factory()->count(20)->create([
            'user_id' => 1
        ]);


    }
}
