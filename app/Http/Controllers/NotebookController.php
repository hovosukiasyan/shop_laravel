<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notebook;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class NotebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notebooks = Notebook::all();
        return view('admin.notebook.notebooks',[
            'notebooks' => $notebooks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.notebook.create');
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
            'price' => ['required','integer'],
            'screen_size' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'screen_resolution' => ['required', 'string'],
            'cpu' => ['required', 'string'],
            'ram' => ['required', 'string'],
            'hard_drive' => ['required', 'string'],
            'graphic_card' => ['required', 'string'],
            'touch_screen' => ['required', 'string'],
            'os' => ['required','string'],
        ]);

        $inputs = $request->all();

        unset($inputs['_token']);
        $inputs['picture'] = session('notebook_picture');
        $notebook = Notebook::create($inputs);

        return redirect('/notebooks/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Notebook $notebook)
    {
        return view('admin.notebook.show',[
            'notebook' => $notebook
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Notebook $notebook)
    {
        return view('admin.notebook.edit',[
            'notebook' => $notebook
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notebook $notebook)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'price' => ['required','integer'],
            'screen_size' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'screen_resolution' => ['required', 'string'],
            'cpu' => ['required', 'string'],
            'ram' => ['required', 'string'],
            'hard_drive' => ['required', 'string'],
            'graphic_card' => ['required', 'string'],
            'touch_screen' => ['required', 'string'],
            'os' => ['required','string'],
        ]);

        $inputs = $request->all();
        unset($inputs['_token']);
        if (session('notebook_picture')) {
            $inputs['picture'] = session('notebook_picture');    
        }else{
            $inputs['picture'] = $notebook->picture;
        }
        
        $notebook->update($inputs);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notebook $notebook)
    {
        $notebook = Notebook::findOrFail($notebook->id);
        $notebook->delete();
        return redirect('/notebooks');
    }
}
