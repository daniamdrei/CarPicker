<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarCapabiityResource;
use App\Http\Resources\CarCapabilityResource;
use App\Http\Resources\CarDetailsResource;
use App\Http\Resources\CarImagesResource;
use App\Models\Car;
use App\Models\CarCapability;
use App\Models\CarImage;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function CarDetails(string $id){

        $car = Car::find($id);

        if(!$car){
            return response()->json(['message'=>'this car dose not exist']);
        }

        $car->with('maker')->get();

        return new CarDetailsResource($car);
    }

    public function CarCapability(string $id){

        $car = Car::find($id);
        if(!$car){
            return response()->json(['message'=>'this car dose not exist']);
        }

        $carCapability = CarCapability::where('car_id' , $id)->first();

        // dd($carCapability);
        return new CarCapabilityResource($carCapability);
    }

    public function CarImages(string $id){

        $car = Car::find($id);
        if(!$car){
            return response()->json(['message'=>'this car dose not exist']);
        }

        $carImages = CarImage::where('car_id' , $id)->get();

        return CarImagesResource::collection($carImages);
    }

    public function CarReview(string $id){

        $car = Car::find($id);
        if(!$car){
            return response()->json(['message'=>'this car dose not exist']);
        }
    }
}
