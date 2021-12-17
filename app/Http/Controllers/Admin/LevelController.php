<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Level;
use App\Http\Requests\StoreLevelRequest;
use App\Http\Requests\UpdateLevelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        return view('admin.levels.index',compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLevelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name' => ['required', 'string','unique:levels,name'],
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف', 
            'unique' => 'هذا المستوي مكرر فى الموقع',

        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }  
            $level=new Level();
            $level->name = $request->name;
            $level->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $level=Level::find($id);
        return view('admin.levels.edit',compact('level'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLevelRequest  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request)
    {
        //$admin=Admin::find(Auth::guard('admin')->user()->id); 
        $validator = validator::make($request->all(),[
            'name' => ['required', 'string','unique:levels,name'],
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف', 
            'unique' => 'هذا المستوي مكرر فى الموقع',

        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }  
            $level=Level::find($request->id);
            $level->name = $request->name;
            $level->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level=Level::find($id);
        $level->delete();
        return Redirect()->route('admin.levels');
    }
}
