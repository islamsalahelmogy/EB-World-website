<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Subject;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /* search for subject or doctor */
    public function search(Request $request) {
        $type=$request->type;
        if($request->type == "subject"){
            $subjects =Subject::where('name','like', '%'.$request->search .'%')->get();
            return response()->json(['subjects'=>$subjects,'type'=>$type]);
        }
        else{
            $doctors =Doctor::where('name','like', '%'.$request->search .'%')->get();
            return response()->json(['doctors'=>$doctors,'type'=>$type]);
        }
    }

    public  function result(Request $request)
    {
        dd($request->all());
    }
}
