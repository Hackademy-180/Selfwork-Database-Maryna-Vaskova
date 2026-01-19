<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home() {
    return view('welcome');
}

public function products_index(){
    // collection
    $products = Song::all();
    return view('products.index', compact("products"));
}

public function products_create(){
    return view('products.create');
}

public function product_submit(Request $request){

    // metodo SAVE - sbagliato
    // $song = new Song();
    // $song->title = $request->title;
    // $song->author = $request->author;
    // $song->year = $request->year;
    // $song->description = $request->description;
    
    // $song->save();


    // Metodo Mass Assigment - coretto

    Song::create([
        'title'=>$request->title,
        'author'=>$request->author,
        'year'=>$request->year,
        'description'=>$request->description,
        'img'=>$request->file('img')->store('image', 'public')
    ]);
    return redirect(route('homepage'))->with('status', 'Canzone aggiunta!');
}

}
