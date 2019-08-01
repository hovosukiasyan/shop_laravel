<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phone;
use App\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = Phone::all();
        return view('admin.phone.phones',[
            'phones' => $phones,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::where('type',1)->get();
        return view('admin.phone.create',[
            'brands' => $brands,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'brand_id' => ['required'],
            'price' => ['required','integer'],
            'launch_status' => ['required', 'integer'],
            'screen_size' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'screen_resolution' => ['required', 'string'],
            'ram' => ['required', 'integer'],
            'memory' => ['required', 'integer'],
            'main_camera' => ['required', 'string'],
            'front_camera' => ['required', 'string'],
            'battery' => ['required', 'integer'],
            'sim_card_quantity' => ['required', 'integer'],
            'os' => ['required','string'],
        ]);

        $inputs = $request->all();

        unset($inputs['_token']);
        $inputs['picture'] = session('phone_picture');
        $phone = Phone::create($inputs);

        return redirect('/phones/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        return view('admin.phone.show',[
            'phone' => $phone
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        $brand = Brand::where('id', $phone->brand_id)->get();
        return view('admin.phone.edit',[
            'phone' => $phone,
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
    public function update(Request $request, Phone $phone)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'price' => ['required','integer'],
            'launch_status' => ['required', 'integer'],
            'screen_size' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'screen_resolution' => ['required', 'string'],
            'ram' => ['required', 'integer'],
            'memory' => ['required', 'integer'],
            'main_camera' => ['required', 'string'],
            'front_camera' => ['required', 'string'],
            'battery' => ['required', 'integer'],
            'sim_card_quantity' => ['required', 'integer'],
            'os' => ['required','string'],
        ]);

        $old_picture = public_path("uploads/phones/" . $phone->picture);
        $inputs = $request->all();
        unset($inputs['_token']);
        if (session('phone_picture')) {
            $inputs['picture'] = session('phone_picture');    
        }else{
            $inputs['picture'] = $phone->picture;
        }
        
        $phone->update($inputs);
        unlink($old_picture);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        $phone = Phone::findOrFail($phone->id);
        $phone->delete();
        return redirect('/phones');
    }
}
