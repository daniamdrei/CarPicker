<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarCapabilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'performance'=>$this->performance,
            'fuel_consumption'=>$this->fuel_consumption,
            'acceleration'=>$this->acceleration,
            'other_details'=>$this->other_details,

        ];
    }
}
