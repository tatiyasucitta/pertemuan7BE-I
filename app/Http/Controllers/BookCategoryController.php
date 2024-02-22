<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookCategoryController extends Controller
{
    public function addform($id){
        $book = Book::find($id);
        return view('bookcategory', ['categories' => Category::all(),
                                    'buku' => $book]);
    }
    public function addcategory(Request $request, $id){
        $book = Book::with('Category')->find($id);
        $book->Category()->attach($request->cat_id);
        return redirect('/');
    }
}
