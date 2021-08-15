<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JWTResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
                'access_token' => $this->resource['token'],
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
                'user' => auth()->user()
        ];
    }

    public function with($request)
    {
        return [
            'message' => 'Successfully to login',
            'status'    => 200,
            'error'     => 0,
        ];
    }
}
