<?php

namespace Database\Factories;

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
            "id" => '',
            "name" => '',
            "price" => 0,
            "stock" => 0,
            "category_id" => 0,
        ];
    }

    public function instantNoodlesFried(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                "name" => 'Mie Goreng Karton',
                "price" => 30000,
                "stock" => 100,
                "category_id" => 1,
            ];
        });
    }

    public function instantNoodlesSoup(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                "name" => 'Mie Kuah Karton',
                "price" => 30000,
                "stock" => 100,
                "category_id" => 1,
            ];
        });
    }

    public function macbookAirM1(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                "name" => 'Mac Book Air M1',
                "price" => 12999999,
                "stock" => 10,
                "category_id" => 2,
            ];
        });
    }

    public function samsungGalaxyS23(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                "name" => 'Samsung Galaxy S24',
                "price" => 15999999,
                "stock" => 10,
                "category_id" => 3,
            ];
        });
    }

    public function tShirtNeoHistoria(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                "name" => 'T shirt Neo Historia',
                "price" => 150000,
                "stock" => 10,
                "category_id" => 4,
            ];
        });
    }
}
