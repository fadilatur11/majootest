<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'image' => $this->image,
            'variant' => $this->variant,
            'store' => $this->store,
            'created_at' => date('d M Y', strtotime($this->created_at))
        ];
    }


    public function with($request)
    {
        return [
            'message' => 'Data Product has been created',
            'status' => 200,
            'error' => 0
        ];
    }
}
