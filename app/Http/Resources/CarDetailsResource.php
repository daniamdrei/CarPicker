<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'maker'=>$this->maker->name,
            'maker_details'=>$this->maker->descriptions,
            'basic_spec	'=>$this->basic_spec,
        ];
    }
}
