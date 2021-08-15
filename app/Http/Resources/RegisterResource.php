<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => date('d M Y', strtotime($this->created_at))
        ];
    }

    public function with($request)
    {
        return [
            'message' => 'Successfully to process data',
            'status'    => 200,
            'error'     => 0,
        ];
    }
}
