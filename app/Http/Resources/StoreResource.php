<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
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
            'store' => $this->store,
            'user_id' => $this->user_id,
            'created_at' => date('d M Y', strtotime($this->created_at))
        ];
    }

    public function with($request)
    {
        return [
            'message' => 'Successfully to create data',
            'status' => 201,
            'error' => 0
        ];
    }
}
