<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'store' => $this->store->name,
            'category' => $this->category->name,
            'name' => $this->name,
            'description' => $this->description,
            'model' => $this->model,
            'price' => $this->price,
            'age' => $this->age,
            'kilometer' => $this->kilometer,
            'type' => $this->type,
            'brand' => $this->brand,
            'image' => $this->image,
        ];
    }
}
