<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Custom\CategorySimpleResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductConditionalAttributesResource extends JsonResource
{
    public static $wrap = "value";

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
            "id" => $this->id,
            "name" => $this->name,
            "categories" => new CategorySimpleResource($this->whenLoaded("categories")),
            "price" => $this->price,
            "is_expensive" => $this->when($this->price > 1000000, true, false),
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
