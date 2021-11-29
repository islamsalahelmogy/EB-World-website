<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Subject;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /* search for subject or doctor */
    public function search(Request $request) {
        //dd($request->all());
        $type = $request->type;
        if($request->type == "subject"){
            $subjects =Subject::where('name','like', '%'.$request->search .'%')->get();
            //dd($subjects);
            $departments = [];
            foreach($subjects as $s) {
                if($departments == []) {
                    array_push($departments,$s->department);
                } else {
                    if(! in_array($s->department , $departments)) {
                        array_push($departments,$s->department);
                    }
                }
            }
            return view('app.search',compact('type','subjects','departments'));
        }
        else if($request->type == "doctor"){
            $doctors =Doctor::where('name','like', '%'.$request->search .'%')->get();
            return view('app.search',compact('type','doctors'));

        }
    }

    
}
