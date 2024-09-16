<?php

namespace Tests\Feature\Resource;

use App\Models\Category;
use Database\Seeders\CategorySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class CategoryResourceTest extends TestCase
{
    public function testResource(): void
    {
        $this->seed([CategorySeeder::class]);
        $category = Category::first();


        self::get("/api/categories/{$category->id}")
            ->assertStatus(200)
            ->assertJson([
                "data" => [
                    "id" => $category->id,
                    "name" => $category->name,
                    "created_at" => $category->created_at->toJSON(),
                    "updated_at" => $category->updated_at->toJSON(),
                ],
            ]);

        Log::info(json_encode($category));
    }

    public function testCollectionOfResource(): void
    {
        $this->seed([CategorySeeder::class]);
        $categories = Category::all();


        self::get("/api/categories")
            ->assertStatus(200)
            ->assertJson([
                "data" => [
                    [
                        "id" =>         $categories[0]->id,
                        "name" =>       $categories[0]->name,
                        "created_at" => $categories[0]->created_at->toJSON(),
                        "updated_at" => $categories[0]->updated_at->toJSON(),
                    ],
                    [
                        "id" =>         $categories[1]->id,
                        "name" =>       $categories[1]->name,
                        "created_at" => $categories[1]->created_at->toJSON(),
                        "updated_at" => $categories[1]->updated_at->toJSON(),
                    ],
                    [
                        "id" =>         $categories[2]->id,
                        "name" =>       $categories[2]->name,
                        "created_at" => $categories[2]->created_at->toJSON(),
                        "updated_at" => $categories[2]->updated_at->toJSON(),
                    ],
                    [
                        "id" =>         $categories[3]->id,
                        "name" =>       $categories[3]->name,
                        "created_at" => $categories[3]->created_at->toJSON(),
                        "updated_at" => $categories[3]->updated_at->toJSON(),
                    ],
                    [
                        "id" =>         $categories[4]->id,
                        "name" =>       $categories[4]->name,
                        "created_at" => $categories[4]->created_at->toJSON(),
                        "updated_at" => $categories[4]->updated_at->toJSON(),
                    ],
                    [
                        "id" =>         $categories[5]->id,
                        "name" =>       $categories[5]->name,
                        "created_at" => $categories[5]->created_at->toJSON(),
                        "updated_at" => $categories[5]->updated_at->toJSON(),
                    ],
                ],
            ]);

        $categories->each(function ($category) {
            self::assertNotNull($category,);
            Log::info(json_encode($category));
        });
    }

    public function testCustomCollectionOfResource(): void
    {
        $this->seed([CategorySeeder::class]);
        $categories = Category::all();


        self::get("/api/categories-custom")
            ->assertStatus(200)
            ->assertJson([
                "total" => 6,
                "data" => [
                    [
                        "id" =>         $categories[0]->id,
                        "name" =>       $categories[0]->name,
                        "created_at" => $categories[0]->created_at->toJSON(),
                        "updated_at" => $categories[0]->updated_at->toJSON(),
                    ],
                    [
                        "id" =>         $categories[1]->id,
                        "name" =>       $categories[1]->name,
                        "created_at" => $categories[1]->created_at->toJSON(),
                        "updated_at" => $categories[1]->updated_at->toJSON(),
                    ],
                    [
                        "id" =>         $categories[2]->id,
                        "name" =>       $categories[2]->name,
                        "created_at" => $categories[2]->created_at->toJSON(),
                        "updated_at" => $categories[2]->updated_at->toJSON(),
                    ],
                    [
                        "id" =>         $categories[3]->id,
                        "name" =>       $categories[3]->name,
                        "created_at" => $categories[3]->created_at->toJSON(),
                        "updated_at" => $categories[3]->updated_at->toJSON(),
                    ],
                    [
                        "id" =>         $categories[4]->id,
                        "name" =>       $categories[4]->name,
                        "created_at" => $categories[4]->created_at->toJSON(),
                        "updated_at" => $categories[4]->updated_at->toJSON(),
                    ],
                    [
                        "id" =>         $categories[5]->id,
                        "name" =>       $categories[5]->name,
                        "created_at" => $categories[5]->created_at->toJSON(),
                        "updated_at" => $categories[5]->updated_at->toJSON(),
                    ],
                ],
            ]);

        $categories->each(function ($category) {
            self::assertNotNull($category,);
            Log::info(json_encode($category));
        });
    }
}
