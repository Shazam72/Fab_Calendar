<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuts')->insert([
            ['statut_name' => 'not confirmed'],
            ['statut_name' => 'confirmed'],
            ['statut_name' => 'validated'],
            ['statut_name' => 'online'],
            ['statut_name' => 'expired'],
            ['statut_name' => 'canceled'],
        ]);
    }
}
