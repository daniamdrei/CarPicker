<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{

    protected $fillable=['name','descriptions'];

    public function cars(){
        return $this->hasMany(Car::class);
    }
}
