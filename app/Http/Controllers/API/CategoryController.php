<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Http\Resources\CategoryResource;
use App\Models\Car;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }

    public function show(string $id){

        $category_id = Category::findOrFail($id);

        if(!$category_id){
            return response()->json(['message'=>'this category not exist']);
        }

        $cars = Car::with('PrimaryImage' , 'model')->where('category_id' , $id)->paginate();
        // $cars = Car::where('category_id' , $id)->paginate();

        // dd($cars);
        return response()->json([
            'cars'=>CarResource::collection($cars)],

        );
    }
}
