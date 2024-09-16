<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Custom\CategorySimpleResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Product
*/
class ProductAllFieldResource extends JsonResource
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
            "categories" => new CategorySimpleResource($this->categories), // categories karena nama function di model Productnya adalah categories.
            "price" => $this->price,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
