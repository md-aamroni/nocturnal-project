<?php

namespace Database\Factories;

use App\Enums\DatabaseStatus;
use App\Enums\LocaleCurrency;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id'   => Category::query()->inRandomOrder()->pluck('id')->first(),
            'title'         => $this->faker->sentence(),
            'slug'          => $this->faker->slug,
            'status'        => DatabaseStatus::PENDING
        ];
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterCreating(function (Product $product) {
            $product->price()->create([
                'currency'  => LocaleCurrency::BDT,
                'total'     => rand(100, 999)
            ]);
        });
    }
}
