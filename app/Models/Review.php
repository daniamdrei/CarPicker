<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable=['name' , 'user_id' , 'car_id' , 'review_type' , 'fuel_consumption' ,
        'acceleration' ,'interior_space' ,'exterior_design' , 'features' , 'estimated_price' , 'status'];

    public function car(){
        return $this->belongsTo(User::class);
    }

    public function use(){
        return $this->belongsTo(User::class);
    }
}
