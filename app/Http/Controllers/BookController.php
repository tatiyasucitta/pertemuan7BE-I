<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function view(){
        $books = Book::all();
        return view('welcome')->with('semuabuku' , $books);
    }

    public function createform(){
        return view('add');
    }

    public function createbook(request $request){
        Book::create([
            'title' => $request->title,
            'price' => $request->price,
            'stock' => $request->stock
        ]);
        return redirect('/');
    }

    public function editform($id){
        $book = Book::findOrFail($id);
        return view('edit')->with('buku', $book);
    }

    public function edit($id, Request $request){
        $book = Book::findOrFail($id)->update([
            'title' => $request->title,
            'price' => $request->price,
            'stock' => $request->stock
        ]);
        return redirect('/');
    }

    public function delete($id){
        Book::destroy($id);

        return redirect('/');
    }
}
