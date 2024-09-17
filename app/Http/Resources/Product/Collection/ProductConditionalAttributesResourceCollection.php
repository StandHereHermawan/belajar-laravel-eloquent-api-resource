<?php

namespace App\Http\Resources\Product\Collection;

use App\Http\Resources\Product\ProductConditionalAttributesResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductConditionalAttributesResourceCollection extends ResourceCollection
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
            "data" => ProductConditionalAttributesResource::collection($this->collection),
        ];
    }
}
