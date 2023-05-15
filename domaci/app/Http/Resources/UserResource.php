<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
	* Transform the resource into an array.
	*
	* @param \Illuminate\Http\Request $request
	* @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializablereturn array<string, mixed>
	*/
    public static $wrap = 'user'; 
    public function toArray( $request): array
    {
        return [
            'name' => $this->resource->name,
            'email' => $this->resource->email,
            'role'=>$this->resource->role
        ];
    }
}
