<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{

    protected $fillable=['image_path' , 'position' ,'car_id'];

    public function car(){
        return $this->belongsTo(Car::class);
    }


}
