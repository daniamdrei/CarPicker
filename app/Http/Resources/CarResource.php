<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'year'=>$this->year,
            'avg_price'=>$this->avg_price,
            'model'=>$this->model->name ?? null,
            'main_image'=>$this->PrimaryImage->image_path ?? null,
        ];
    }
}
//new ModelResource($this->whenLoaded('model')),new PrimaryImageResource($this->whenLoaded('PrimaryImage')),
