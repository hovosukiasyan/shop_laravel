<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brand.brands',[
            'brands' => $brands,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        // 'name' => 'unique:games,name,NULL,id,user_id,'.$user->id
        $request->validate([
            'name' => ['required', 'string','unique:brands,name, NULL,id,type,' . $request->type],
            'type' => ['required'],
        ]);

        $inputs = $request->all();

        unset($inputs['_token']);
        $brand = Brand::create($inputs);

        return redirect('/brands/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('admin.brand.show',[
            'brand' => $brand
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit',[
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => ['required', 'string','unique:brands,name, NULL,id,type,' . $request->type],
            'type' => ['required','integer'],
        ]);

        $inputs = $request->all();
        unset($inputs['_token']);
        
        $brand->update($inputs);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand = Brand::findOrFail($brand->id);
        $brand->delete();
        return redirect('/brands');
    }
}
