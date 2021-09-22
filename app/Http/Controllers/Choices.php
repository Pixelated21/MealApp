<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal_Choices;
use App\Models\Meal_Options;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class Choices extends Controller
{
    public function addChoice(Request $request){


        $option_ids = $request->input("option_id");

        foreach ($option_ids as $option_id){

            Meal_Choices::create([
                'user_id' => Auth::user()->user_id,
                'option_id' => $option_id,
                'date' => $request->input("date"),
            ]);

        }

        return redirect()->back()->with("success","Meal Added Successfully");

    }

    public function view(){

          $choices = Meal_Choices::with("option","user")->get()->toArray();

//          dd($choices);




        return view("Admin.view",compact("choices"));


    }
}
