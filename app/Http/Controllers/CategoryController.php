<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function createform(){
        return view('addcategory');
    }
    public function create(Request $request){
        Category::create([
            'categoryName' => $request->categoryName
        ]);
        return redirect('/');
    }
}
