<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nom' => 'admin',
                'prenom' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('0000000000'),
                'formasuiv_id' => null,
                'statut_id' => 3,
                'role' => "admin",
                'avatars' => 'avatars/dafault.png',
                'validation_token' => null,
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'nom' => 'apprenant',
                'prenom' => 'apprenant',
                'email' => 'apprenant@gmail.com',
                'password' => bcrypt('0000000000'),
                'formasuiv_id' => 3,
                'statut_id' => 3,
                'role' => "apprenant",
                'avatars' => 'avatars/dafault.png',
                'validation_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
