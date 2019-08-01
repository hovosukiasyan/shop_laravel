<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tablet;
use App\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class TabletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tablets = Tablet::all();
        return view('admin.tablet.tablets',[
            'tablets' => $tablets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::where('type',3)->get();
        return view('admin.tablet.create',[
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
        // dd($inputs)
        unset($inputs['_token']);
        $inputs['picture'] = session('tablet_picture');
        $tablet = Tablet::create($inputs);

        return redirect('/tablets/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tablet $tablet)
    {
        return view('admin.tablet.show',[
            'tablet' => $tablet
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tablet $tablet)
    {
        $brand = Brand::where('id', $tablet->brand_id)->get();
        return view('admin.tablet.edit',[
            'tablet' => $tablet,
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
    public function update(Request $request, Tablet $tablet)
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

        $old_picture = public_path("uploads/tablets/" . $tablet->picture);

        $inputs = $request->all();
        unset($inputs['_token']);
        if (session('tablet_picture')) {
            $inputs['picture'] = session('tablet_picture');    
        }else{
            $inputs['picture'] = $tablet->picture;
        }
        
        $tablet->update($inputs);
        unlink($old_picture);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tablet $tablet)
    {
        $tablet = Tablet::findOrFail($tablet->id);
        $tablet->delete();
        return redirect('/tablets');
    }
}
