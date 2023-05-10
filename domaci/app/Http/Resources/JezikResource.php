<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JezikResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap = 'jezik'; 
    public function toArray(Request $request): array
    {
        return [
            'naziv'=>$this->resource->naziv,

        ];
    }
}
