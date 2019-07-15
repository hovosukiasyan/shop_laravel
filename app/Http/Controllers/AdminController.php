<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function profile()
    {
        $user = Auth::user();

        return view('admin.account',[
            'user' => $user
        ]);
    }

    public function crop(Request $request)
    {
        $picture = $request->picture;
        
        list($type, $picture) = explode(';', $picture);
        list(, $picture)      = explode(',', $picture);
        $picture = base64_decode($picture);
        $picture_name= time().'.png';
        $url = explode('/',url()->current());
        
        if ($url[3]="products") {
            
            $path = public_path('/uploads/products/'.$picture_name);
            file_put_contents($path, $picture);
    
            $request->session()->put('product_picture',$picture_name );            
        
        
        }if ($url[3] = "phones") {
            
            $path = public_path('/uploads/phones/'.$picture_name);
            file_put_contents($path, $picture);
    
            $request->session()->put('phone_picture',$picture_name );
        }

    }
}
