<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function view(){
        $books = Book::all();
        
        return view('welcome')->with('semuabuku' , $books);
    }

    public function createform(){
        return view('add')->with('authors', Author::all());
    }

    public function createbook(request $request){
        $request->validate([
            'bookpic' => 'mimes:jpg, jpeg, png'
        ]);

        if($request->hasFile('bookpic')){
            $image_path = 'public/bookimage/images';
            $image = $request->file('bookpic');
            $image_name = $image->getClientOriginalName();
            $image->storeAs($image_path, $image_name);
        }

        Book::create([
            'title' => $request->title,
            'price' => $request->price,
            'stock' => $request->stock,
            'author_id' => $request->author_id,
            'image' => $image_name
        ]);
        return redirect('/');
    }

    public function editform($id){
        $book = Book::findOrFail($id);
        return view('edit')->with('buku', $book)->with('authors', Author::all());
    }

    public function edit($id, Request $request){
        // cari bukunya di database, trs simpen di variable book
        $book = Book::findOrFail($id);

        $request->validate([
            'bookpic' => 'mimes:jpg, jpeg, png'
        ]);

        if($request->hasFile('bookpic')){
            $image_path = '/public/bookimage/images';
            Storage::delete($image_path.$book->image);

            $image = $request->file('bookpic');
            $image_name = $image->getClientOriginalName();
            $image->storeAs($image_path, $image_name);
        }

        $book->update([
            'title' => $request->title,
            'price' => $request->price,
            'stock' => $request->stock,
            'author_id' => $request->author_id,
            'image' => $image_name
        ]);

        return redirect('/');
    }

    public function delete($id){
        Book::destroy($id);

        return redirect('/');
    }
}
