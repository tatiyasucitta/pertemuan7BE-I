<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function createform(){
        return view('createauthor');
    }

    public function create(Request $request){
        $request->validate([
            'author_name' => 'required| min:5'
        ]);

        Author::create([
            'name' => $request->author_name
        ]);
        
        return redirect('/');
    }
}
