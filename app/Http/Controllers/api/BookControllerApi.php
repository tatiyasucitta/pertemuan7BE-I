<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class BookControllerApi extends Controller
{
    public function index(){
        $books = Book::all();

        return response()->json([
            "buku" => $books
        ], 200);
    }

    public function create(Request $request){
        $validate = Validator::make($request->all(), [
            'title' => 'required | min:5'
        ]);

        if($validate->fails()){
            return response($validate->messages(), 422);
        }else{
            $book = Book::create([
                'title' => $request->title,
                'price' => $request->price,
                'stock' => $request->stock,
                'author_id' => $request->author_id,
                'image' => $request->bookpic
            ]);
    
            return response()->json([
                "buku" => $book
            ], 200);
        }

    }
}
