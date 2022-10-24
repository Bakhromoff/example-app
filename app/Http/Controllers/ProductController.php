<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public function create() {
        return view('create');
    }
    public function store(Request $req) {
        $req->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpg,png,svg,jpeg,pdf'
        ]);
        $product = new Product;
        $product->name = $req->name;
        $product->price = $req->price;
        $product->status = $req->status;
        $product->unit = $req->unit;
        if($req->hasFile('image')) {
            $unique = md5(rand(1,999).microtime());
            $extension = $req->file('image')->extension();
            $path = $unique.'.'.$extension;
            $req->file('image')->storeAs('public/images/', $path);
            $product->image = $path;
        }
        $product->save();
            return redirect(route('index'));

    }
    public function delete($id) {
        $product = Product::where('id', $id)->first();
        if(file_exists('storage/images/'.$product->image)) {
            unlink('storage/images/'.$product->image);
        }
        $product->delete();
        return redirect()->back();
    }
    public function edit($id) {
        $product = Product::findOrFail($id);
        return view('edit', compact('product'));
    }
    public function update($id,Request $request) {
        $request->validate([
        'name' => 'required',
        'price' => 'required|numeric'
        ]);
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->unit = $request->unit;
        if ($request->hasFile('image')) {
            $old_path = $product->image;
            $unique = md5(rand(1,999).microtime());
            $extension = $request->file('image')->extension();
            $path = $unique.'.'.$extension;
            $request->file('image')->storeAs('public/images/', $path);
            $product->image = $path;
            if(file_exists('storage/images/'.$old_path)) {
                unlink('storage/images/'.$old_path);
            }
        }
        $product->save();
        return redirect(route('index'));
    }
}
