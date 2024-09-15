<?php

namespace Database\Factories;

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
            "id" => '',
            "name" => '',
            "description" => "",
        ];
    }

    public function food(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                "id" => 1,
                "name" => 'Food',
                "description" => "Food Category",
            ];
        });
    }

    public function electronicProduct(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                "id" => 2,
                "name" => 'Electronic Product',
                "description" => "Electronic Product Category",
            ];
        });
    }

    public function gadget(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                "id" => 3,
                "name" => 'Gadget',
                "description" => "Gadget Category",
            ];
        });
    }

    public function clothes(): Factory
    {
        return $this->state(function (array $attributes) {

            return [
                "id" => 4,
                "name" => 'Clothes',
                "description" => "Clothes Category",
            ];
        });
    }
}
