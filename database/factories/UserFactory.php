<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\MailFake;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => bcrypt('0000000000'),
            'formasuiv_id' => rand(1,5),
            'statut_id' => rand(1,3),
            'avatars' => 'avatars/default.png',
            'validation_token' => null,
        ];
    }
}
