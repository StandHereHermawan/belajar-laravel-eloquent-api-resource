<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $index = 1;

        $product1 = Product::factory()->instantNoodlesFried()->create(["id" => $index,]);
        $product1->save();
        $index++;

        $product2 = Product::factory()->instantNoodlesSoup()->create(["id" => $index,]);
        $product2->save();
        $index++;

        $product3 = Product::factory()->macbookAirM1()->create(["id" => $index,]);
        $product3->save();
        $index++;

        $product4 = Product::factory()->samsungGalaxyS23()->create(["id" => $index,]);
        $product4->save();
        $index++;

        $product5 = Product::factory()->tShirtNeoHistoria()->create(["id" => $index,]);
        $product5->save();
        $index++;
    }
}
