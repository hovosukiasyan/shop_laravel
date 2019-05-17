<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:1', 'max:25'],
            'price' => ['required', 'min:1', 'max:25'],
            'picture' => ['required','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);

        $inputs = $request->all();       
        // dd($inputs);

        unset($inputs['picture']);
        unset($inputs['_token']);

        if ($request->hasFile('picture')) {
            $destinationPath = public_path('uploads\files ');
            $url = $request->file('picture')->getClientOriginalExtension();
            $filename = uniqid().'.'.$url;
            $request->file('picture')->move($destinationPath, $filename);
            $inputs['picture'] = $filename;
        }

        $product = Product::create($inputs);

        return redirect('/products/');
    }

    public function allProducts(Product $product)
    {
        $products = Product::all();
        return view('admin.products',[
            'products' => $products,
        ]);
    }

    public function show(Product $product)
    {
        return view('admin.show',[
            'product' => $product,
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => ['required','string', 'max:255'],
            'price' => ['required','string', 'max:255'],
            'content'  => ['required','string', 'max:255'],
        ]);

        return redirect()->back();
    }

    public function destroy(Product $product)
    {
        $product = Product::findOrFail($product->id);
        $product->delete();
        return redirect('/products');
    }
}