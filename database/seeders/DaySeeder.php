<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->insert([
            [
                'day' => 'monday',
                'day_french' => 'Lundi'
            ],
            [
                'day' => 'tuesday',
                'day_french' => 'Mardi'
            ],
            [
                'day' => 'wednesday',
                'day_french' => 'Mercredi'
            ],
            [
                'day' => 'thursday',
                'day_french' => 'Jeudi'
            ],
            [
                'day' => 'friday',
                'day_french' => 'Vendredi'
            ],
            [
                'day' => 'saturday',
                'day_french' => 'Samedi'
            ],
        ]);
    }
}
