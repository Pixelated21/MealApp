<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Meal_Choices;
use App\Models\Meal_Options;
use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class Authentication extends Controller
{

    public function index(){

//        $product = Meal_Options::with(Category::class)->get();
        $category = Meal_Options::with("category")->get()->toArray();

//        dd($category);

        return view("User.index")
            ->with(compact("category"));
    }

    public function adminIndex(){

        $options = Category::all()->toArray();

//        dd($options);

        return view("Admin.index")
            ->with(compact("options"));
    }

    public function loginIndex(){
        return view("Login-Registration.login");
    }

    public function login(Request $request){

        $validation = $request->validate([
            'email' => ['required','email'],
            'password' => ['required','min:2'],
        ]);

        if (Auth::attempt($validation)) {

            if (Auth::user()->is_admin) {
                return redirect('/admin');
            }
            return redirect('/');

        }

        return redirect()->back();
    }

    public function registerIndex(){
        return view("Login-Registration.register");

    }

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

    public function register(Request $request){

//        dd($request->all());
        $validate = $request->validate([
            'first_nm' => ['required'],
            'last_nm' => ['required'],
            'email' => ['email','required'],
            'password' => ['required','confirmed'],
            'password_confirmation' => ['required']
        ]);

        $loginValidate = $request->validate([
            'email' => ['required','unique:users'],
           'password' => ['required'],
        ]);

        User::create([

            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'first_nm' => $request->get('first_nm'),
            'last_nm' => $request->get('last_nm'),

        ]);
//
        if (Auth::attempt($loginValidate)) {
            return redirect('/');
        }

        return back();
    }

    public function logout(){
        Auth::logout();

        return redirect("/login");
    }
}
