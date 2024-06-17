<?php

namespace Database\Factories;

use App\Enums\ProfilStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profil>
 */
class ProfilFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->name(),
            'prenom' => fake()->name(),
            'image' => fake()->image(storage_path('app/public'), 250, 250, null, false),
            'status' => fake()->randomElement(ProfilStatusEnum::cases()),
        ];
    }
}
