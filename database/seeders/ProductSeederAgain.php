<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeederAgain extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::all()->each(function (Category $category) {
            for ($i = 1; $i <= 5; $i++) {
                $category->products()->create([
                    "name" => "Product $i of $category->name",
                    "price" => rand(10000, 40000),
                ]);
            }
        });
    }
}
