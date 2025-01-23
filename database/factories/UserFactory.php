<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'f_name' => fake()->firstName(),
            'm_name' => fake()->lastName(),
            'l_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified' => false,
            'password' => static::$password ??= Hash::make('password'),
            'role' => 'USER',
            'position_id' => 1,
            'department_id' => 1,
            'company_id' => 1,
            'created_by' => 'SYSTEM',
            'updated_by' => 'SYSTEM',
            'is_deleted' => 0,
            'deleted_by' => null,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
