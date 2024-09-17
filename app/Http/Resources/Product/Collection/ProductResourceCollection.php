<?php

namespace App\Http\Resources\Product\Collection;

use App\Http\Resources\Product\ProductAllFieldResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductResourceCollection extends ResourceCollection
{
    public static $wrap = "data";
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    // public function toArray(Request $request): array
    // {
    //     return parent::toArray($request);
    // }
    public function toArray(Request $request): array
    {
        return [
            "data" => ProductAllFieldResource::collection($this->collection),
        ];
    }
}
