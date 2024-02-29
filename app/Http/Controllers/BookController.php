<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Str;

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
            $path = $request->file('bookpic')->storeAs($image_path, $image_name);
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

        // validasi format fotonya cuma blh jpg, jpeg atau png
        $request->validate([
            'bookpic' => 'mimes:jpg, jpeg, png'
        ]); 

        if($request->hasFile('bookpic')){  // cek apakah ada file yang namanya 'bookpic' dr inputan user
            $image_path = 'public/bookimage/images/'; // kasi tau path imagenya mau di simpen di folder apa
            $image = $request->file('bookpic'); // tampung image yang disubmit dar user 
            $image_name = $image->getClientOriginalName(); // ambil namanya file image usernya
            $image->storeAs($image_path, $image_name); // store file yang baru
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
