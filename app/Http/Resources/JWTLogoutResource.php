<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JWTLogoutResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [];
    }

    public function with($request)
    {
        return [
            'message' => $this->resource['message'],
            'status' => 200,
            'error' => 0
        ];
    }
}
