<?php

namespace App\Http\Resources\Custom;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategorySimpleResourceCollection extends ResourceCollection
{
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
            "data" => CategorySimpleResource::collection($this->collection),
            "total" => count($this->collection),
        ];
    }
}
