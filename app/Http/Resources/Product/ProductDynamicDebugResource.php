<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductDynamicDebugResource extends JsonResource
{
    public static $wrap = "data";
    
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    // public function toArray(Request $request): array
    // {
    //     return parent::toArray($request);
    // }
    public function toArray(Request $request): array
    {
        return [
            "author" => "Arief Karditya Hermawan",
            "server_time" => now()->toDateTimeString(),
            "data" => [
                "id" => $this->id,
                "price" => $this->price,
                "name" => $this->name,
            ],
        ];
    }
}
