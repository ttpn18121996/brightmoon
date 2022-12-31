<?php

namespace Database\Factories;

use BrightMoonFaker\Factory;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function define()
    {
        $name = $this->faker->name();

        return [
            'name' => $name,
            'email' => $this->faker->safeEmail($name),
            'password' => \BrightMoon\Support\Facades\Hash::make('123456'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
