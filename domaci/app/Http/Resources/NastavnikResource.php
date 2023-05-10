<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NastavnikResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public static $wrap='nastavnik';
    public function toArray(Request $request): array
    {
        return [
            'ime' => $this->resource->ime,
            'brojTelefona' => $this->resource->brojTelefona,
            'godineIskustva' => $this->resource->godineIskustva,
            'email' => $this->resource->email,

        ];
    }
}
