<?php

namespace Tests\Feature\Model\Product;

use App\Models\Product;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\ProductSeederAgain;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class UnitTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testProduct(): void
    {
        self::seed([CategorySeeder::class, ProductSeeder::class ,ProductSeederAgain::class]);
        $product = Product::first();

        self::assertNotNull($product);
        Log::debug(json_encode($product));

        self::get("/api/products/$product->id")
            ->assertStatus(200)
            ->assertJson([
                "value" => [
                    "name" => $product->name,
                    "categories" => [
                        "id" => $product->categories->id,
                        "name" => $product->categories->name,
                    ],
                    "price" => $product->price,
                    "created_at" => $product->created_at->toJSON(),
                    "updated_at" => $product->updated_at->toJSON(),
                ],
            ]);
    }
}
