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
}
