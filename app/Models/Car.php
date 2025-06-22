<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable =['maker_id' , 'car_model_id' , 'category_id' , 'name' , 'year' , 'avg_price' ,'basic_spec'];


    public function maker(){
        return $this->belongsTo(Maker::class);
    }


    public function model(){
        return $this->belongsTo(CarModel::class);
    }


    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function reviews(){
        return $this->hasMany(Review::class);
    }


    public function car_capabilities(){
        return $this->hasMany(CarCapability::class);
    }


    public function images(){
        return $this->hasMany(CarImage::class);
    }

    public function PrimaryImage(){
        return $this->hasOne(CarImage::class)->oldestOfMany();
    }
    
}
