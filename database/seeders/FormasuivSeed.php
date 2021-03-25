<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormasuivSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('formasuivs')->insert([
            ['formation' => 'Cyber-sécurité'],
            ['formation' => 'Développement Web et Web Mobile'],
            ['formation' => 'Graphisme'],
            ['formation' => 'Administration de Bases de données'],
            ['formation' => 'Administration des Réseaux Informatiques'],
            ['formation' => 'Architecture'],
            ['formation' => 'Référencement Digital'],
            ['formation' => 'Web Designer']
        ]);
    }
}
