<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Category;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
       Category::create([
            'category_nm' => $request->get("cat_nm"),
        ]);

        return redirect()->back()->with("success","Category Added Successfully");
    }
}
