<?php

namespace Database\Factories;

use App\Enums\DatabaseStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'     => $this->faker->word(),
            'slug'      => $this->faker->slug,
            'status'    => DatabaseStatus::PENDING
        ];
    }
}
