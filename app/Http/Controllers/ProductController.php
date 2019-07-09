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
        return view('admin.product.create');
    }

    public function crop(Request $request)
    {
        $picture = $request->picture;
        
        list($type, $picture) = explode(';', $picture);
        list(, $picture)      = explode(',', $picture);
        $picture = base64_decode($picture);
        $picture_name= time().'.png';
        $path = public_path('uploads/products/'.$picture_name);
        file_put_contents($path, $picture);

        $request->session()->put('product_picture',$picture_name );
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:1', 'max:25'],
            'price' => ['required', 'min:1', 'max:25'],
        ]);

        $inputs = $request->all();

        unset($inputs['_token']);
        $inputs['picture'] = session('product_picture');
        $product = Product::create($inputs);

        return redirect('/products/');
    }

    public function allProducts(Product $product)
    {
        $products = Product::all();
        return view('admin.product.products',[
            'products' => $products,
        ]);
    }

    public function show(Product $product)
    {
        return view('admin.product.show',[
            'product' => $product,
        ]);
    }

    public function edit(Product $product)
    {
        return view('admin.product.edit',[
            'product' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => ['required','string', 'max:255'],
            'price' => ['required','string', 'max:255']
        ]);

        $inputs = $request->all();
        unset($inputs['_token']);
        if (session('product_picture')) {
            $inputs['picture'] = session('product_picture');    
        }else{
            $inputs['picture'] = $product->picture;
        }
        
        $product->update($inputs);

        return redirect()->back();
    }

    public function destroy(Product $product)
    {
        $product = Product::findOrFail($product->id);
        $product->delete();
        return redirect('/products');
    }
}