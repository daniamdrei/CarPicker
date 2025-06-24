<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarDetailsResource;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function AarDetails(string $id){

        $car = Car::findOrFail($id);

        $car->with('maker')->get();

        return new CarDetailsResource($car);



    }
}
