<?php

namespace App\Http\Controllers;

use App\Models\Meal_Options;
use Illuminate\Http\Request;

class Meal extends Controller
{
    public function create(Request $request){

//        dd($request->all());
        Meal_Options::create([
            'option_nm' => $request->get('meal_nm'),
            'category_id' => $request->get('category_id'),
        ]);

        return redirect()->back()->with("success","Meal Added Successfully");

    }
}
