<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = Category::factory()->food()->create([]);
        $category1->save();

        $category2 = Category::factory()->electronicProduct()->create([]);
        $category2->save();

        $category3 = Category::factory()->gadget()->create([]);
        $category3->save();

        $category4 = Category::factory()->clothes()->create([]);
        $category4->save();
    }
}
