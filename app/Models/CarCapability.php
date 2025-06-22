<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarCapability extends Model
{
     protected $fillable=['car_id' , 'performance' ,'fuel_consumption' ,'acceleration' , 'other_details'];

    public function car(){
        return $this->belongsTo(Car::class);
    }
}
