<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariantResource extends JsonResource
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
            'parent_id' => $this->parent_id,
            'updated_at' => date('d M Y', strtotime($this->updated_at))
        ];
    }

    public function with($request)
    {
        return [
            'message' => 'Your product variant has been updated',
            'status' => 200,
            'error' => 0,
        ];
    }
}
