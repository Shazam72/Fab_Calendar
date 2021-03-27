<?php

namespace Database\Seeders;

use App\Models\Formasuiv;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            StatutSeed::class,
            FormasuivSeed::class,
            DaySeeder::class,
        ]);
        User::factory(10)->create();
    }
}
