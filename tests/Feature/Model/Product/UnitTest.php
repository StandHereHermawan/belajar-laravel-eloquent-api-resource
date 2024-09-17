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
        self::seed([CategorySeeder::class, ProductSeeder::class, ProductSeederAgain::class]);
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

    public function testCollectionOfProduct(): void
    {
        self::seed([CategorySeeder::class, ProductSeeder::class, ProductSeederAgain::class]);
        $response = $this->get("/api/products")
            ->assertStatus(200);

        $names = $response->json("data.*.name");

        for ($i = 1; $i <= 5; $i++) {
            self::assertContains("Product $i of Food", $names);
        }

        for ($i = 1; $i <= 5; $i++) {
            self::assertContains("Product $i of Gadget", $names);
        }
    }

    public function testProductsPaging(): void
    {
        self::seed([CategorySeeder::class, ProductSeeder::class, ProductSeederAgain::class]);

        $response = $this->get('/api/products-paging')
            ->assertStatus(200);

        self::assertNotNull($response->json("links"),);
        self::assertNotNull($response->json("meta"),);
        self::assertNotNull($response->json("data"),);
    }

    public function testAdditionalMetadata(): void
    {
        self::seed([CategorySeeder::class, ProductSeeder::class, ProductSeederAgain::class]);
        $product = Product::first();

        self::assertNotNull($product);
        $this->get("/api/products-debug/$product->id")
            ->assertStatus(200)
            ->assertJson([
                "author" => "Arief Karditya Hermawan",
                "data" => [
                    "id" => $product->id,
                    "name" => $product->name,
                    "price" => $product->price,
                ],
            ]);
        Log::debug(json_encode($product));
    }

    public function testAdditionalDynamicParameter(): void
    {
        self::seed([CategorySeeder::class, ProductSeeder::class, ProductSeederAgain::class]);
        $product = Product::first();
        self::assertNotNull($product);

        $response = $this->get("/api/products-debug-dynamic/$product->id")
            ->assertStatus(200)
            ->assertJson([
                "author" => "Arief Karditya Hermawan",
                "data" => [
                    "id" => $product->id,
                    "name" => $product->name,
                    "price" => $product->price,
                ],
            ]);

        self::assertNotNull($response);
        self::assertNotNull($response->json("server_time"));

        Log::debug(json_encode($product));
        Log::debug(json_encode($response));
        Log::debug(json_encode($response->json()));
        Log::debug(json_encode($response->status()));
    }

    public function testConditionalAttributes(): void
    {
        self::seed([CategorySeeder::class, ProductSeeder::class, ProductSeederAgain::class]);

        $product = Product::first();
        self::assertNotNull($product);
        Log::debug(json_encode($product));

        $response = $this->get("/api/products/conditional/category-loaded/$product->id")
            ->assertStatus(200)
            ->assertJson([
                "value" => [
                    "name" => $product->name,
                    "categories" => [
                        "id" => $product->categories->id,
                        "name" => $product->categories->name,
                    ],
                    "price" => $product->price,
                    "is_expensive" => $product->price > 1000000,
                    "created_at" => $product->created_at->toJSON(),
                    "updated_at" => $product->updated_at->toJSON(),
                ],
            ]);

        self::assertNotNull($response);
        Log::debug(json_encode($response));
        Log::debug(json_encode($response->json()));

        $response = $this->get("/api/products/conditional/$product->id")
            ->assertStatus(200)
            ->assertJson([
                "value" => [
                    "name" => $product->name,
                    "price" => $product->price,
                    "is_expensive" => $product->price > 1000000,
                    "created_at" => $product->created_at->toJSON(),
                    "updated_at" => $product->updated_at->toJSON(),
                ],
            ]);

        self::assertNotNull($response);
        Log::debug(json_encode($response));
        Log::debug(json_encode($response->json()));
    }
}
