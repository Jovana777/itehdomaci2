<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'user' => $this->resource->user,
            'jezik' => $this->resource->jezik,
            'nastavnik' => $this->resource->nastavnik,
            'note' => $this->resource->note,
        ];
    }
}
