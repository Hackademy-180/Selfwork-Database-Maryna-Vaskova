<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function home() {
        return view('welcome');
    }
    
    public function products_index(){
        $products = Song::all();
        return view('products.index', compact("products"));
    }
    
    public function products_create(){
        return view('products.create');
    }
    
    public function product_submit(Request $request)
    {
        // Валідація
        $data = $request->validate([
            'title'=>'required',
            'author'=>'required',
            'year'=>'required|integer',
            'description'=>'required',
            'img'=>'required|image'  // тут file має бути обов'язковим
        ]);
        
        // Прив'язуємо користувача
        $data['user_id'] = Auth::id();
        
        // Зберігаємо файл
        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('products', 'public');
        }
        
        // Створюємо запис
        Song::create($data);
        
        return redirect()->route('products_index')
        ->with('status', 'Canzone aggiunta!');
    }
    
    
    public function products_edit(Song $song)
    {
        $product = $song;
        return view('products.edit', compact('product'));
    }
    
    public function products_update(Request $request, Song $song)
    {
        $data = $request->validate([
            'title' => 'required',
            'year' => 'required|integer',
            'author' => 'required',
            'description' => 'required',
            'img' => 'nullable|image'
        ]);
        
        if ($request->hasFile('img')) {
            if($song->img) {
                Storage::disk('public')->delete($song->img);
            }
            $data['img'] = $request->file('img')->store('products', 'public');
        }
        
        $song->update($data);
        
        return redirect()->route('products_index')->with('status', 'Canzone aggiornata!');
    }
    
    public function products_show(Song $song)
    {
        $product = $song; // щоб збігалося з твоїми view
        return view('products.show', compact('product'));
    }
    
    
    
    public function products_delete(Song $song)
    {
        // видалити картинку з storage, якщо є
        if($song->image) {
            Storage::disk('public')->delete($song->image);
        }
        
        $song->delete();
        return redirect()->route('products_index')
        ->with('status', 'Canzone eliminata!');
    }
}
