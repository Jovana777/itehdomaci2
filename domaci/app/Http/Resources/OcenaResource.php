<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\JezikResource;
use App\Http\Resources\NastavnikResource;

class OcenaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static $wrap='ocena';
    public function toArray(Request $request): array
    {
        return [
            'datumIVreme' => $this->resource->datumIVreme,
            'user' => new UserResource($this->resource->userkey),
            'jezik' => new JezikResource($this->resource->jezikkey),
            'nastavnik' => new NastavnikResource($this->resource->nastavnikkey),
            'note' => $this->resource->note,
        ];
    }
}
