<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Subject;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Requirment;
use Illuminate\Support\Str;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        $doctors = Doctor::all();
        $levels = Level::all();
        $departments = Department::all();
        return view('admin.subjects.index',compact('subjects','doctors','levels','departments'));
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
    
    public function deptResult(Request $request)
    {
        $doctors=Department::find($request->id)->doctors;
        $subjects=Department::find($request->id)->subjects;
        $type="doctors";
        $doctors_view=view('admin.subjects.comon',compact('type','doctors'))->render();
        $type="subjects";
        $subjects_view=view('admin.subjects.comon',compact('type','subjects'))->render();
        return response()->json(["subjects_html"=>$subjects_view,"doctors_html"=>$doctors_view]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name' => ['required', 'string','max:255'],
            'description'   => 'required', 'string', 'max:255',
            'cover' => 'required|image|mimes:jpeg,jpg,png',
            'doctor_id' => ['required', 'string', 'max:255','gt:0'],
            'department_id' => ['required', 'string', 'max:255','gt:0'],
            'level_id' => ['required', 'string', 'max:255','gt:0'],
        ],[
            'required' => '?????????? ?????? ?????????? ????????????',
            'string' => '?????? ?????????? ???? ?????????? ?????? ???????? ???????????? ??????????', 
            'image'=>'???????? ???? ???????? ???????? ',
            'mimes' => '???? ???? ???? ???????? ?????? ?????????? jpeg ???? jpg ???? png',
            'numeric' => '?????? ???? ?????????? ?????????? ?????? ?????????? ??????',
            'phone.digits' => '?????????? ?????? ???????? ???????? ???? ???????? ???????? ???? 8 ??????????',
            'gt'=>'?????????? ?????? ?????????? ??????????',
            'max'=> '???? ???????? ???? ???????? ?????????? ???????? ???? 225 ??????',
            'min' => '???????? ???? ???????? ?????????? ???????? ?????? ?????????? ???? 8 ??????????',
        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } 
            $subject=new Subject();
            $subject->name = $request->name;
            $subject->description = nl2br($request->description);
            $subject->code = Str::random(20);
            $subject->doctor_id = $request->doctor_id;
            $subject->department_id = $request->department_id;
            $subject->level_id = $request->level_id;
            $subject->save();
            if(count($request->pre_id)>0)
            {
                foreach ($request->pre_id as $r) {
                    $req=new Requirment();
                    $req->subject_id=$subject->id;
                    $req->requirment_id=$r;
                    $req->save();
                }
            }

            $subjectId = $subject->id;
            $file = $request->file('cover');
            if (is_dir(public_path('assets/images/data/subjects/' . $subjectId )) == false) {
                mkdir(public_path('assets/images/data/subjects/' . $subjectId ));
            }
            $file_path = public_path('assets/images/data/subjects/' . $subjectId );
            $old_file = $file_path . '/' . $subject->cover;
            $file_name = str_replace([' ','#','&','=','?'],'-',$file->getClientOriginalName());
            $file->move($file_path, $file_name);
            
            $subject->cover = $file_name;
            $subject->save();
            if (file_exists($old_file)) {
                File::delete($old_file);
            }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject=Subject::find($id);
        $departments=Department::all();
        $doctors=$subject->department->doctors;
        $subjects=$subject->department->subjects;
        $levels = Level::all();
        return view('admin.subjects.edit',compact('subject','departments','levels','doctors','subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubjectRequest  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function updateImage(Request $request)
    {
        $validator = validator::make($request->all(),[
            'cover' => 'required|image|mimes:jpeg,jpg,png',
        ],[
            'required' => '?????????? ?????? ?????????? ????????????',
            'image'=>'???????? ???? ???????? ???????? ',
            'mimes' => '???? ???? ???? ???????? ?????? ?????????? jpeg ???? jpg ???? png',
            
        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } 
        $subject=Subject::find($request->id);
        $subjectId = $subject->id;
            $file = $request->file('cover');
            if (is_dir(public_path('assets/images/data/subjects/' . $subjectId )) == false) {
                mkdir(public_path('assets/images/data/subjects/' . $subjectId ));
            }
            $file_path = public_path('assets/images/data/subjects/' . $subjectId );
            $old_file = $file_path . '/' . $subject->cover;
            $file_name = str_replace([' ','#','&','=','?'],'-',$file->getClientOriginalName());
            $file->move($file_path, $file_name);
            
            $subject->cover = $file_name;
            $subject->save();
            if (file_exists($old_file)) {
                File::delete($old_file);
            }
    }

    public function updateBasic(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name' => ['required', 'string','max:255'],
            'description'   => 'required', 'string', 'max:255',
            'level_id' => ['required', 'string', 'max:255','gt:0'],
        ],[
            'required' => '?????????? ?????? ?????????? ????????????',
            'string' => '?????? ?????????? ???? ?????????? ?????? ???????? ???????????? ??????????', 
            'max'=> '???? ???????? ???? ???????? ?????????? ???????? ???? 225 ??????',
        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }  
            $subject=Subject::find($request->id);
            $subject->name = $request->name;
            $subject->description = $request->description;
            $subject->level_id = $request->level_id;
            $subject->save();
    }
    
    public function updateAdvanced(Request $request)
    {
        $validator = validator::make($request->all(),[
            'department_id'   => 'required', 'string', 'max:255','gt:0',
            'doctor_id' => ['required', 'string', 'max:255','gt:0'],
        ],[
            'required' => '?????????? ?????? ?????????? ????????????',
            'string' => '?????? ?????????? ???? ?????????? ?????? ???????? ???????????? ??????????', 
            'gt'=>'?????????? ?????? ?????????? ??????????',
            'max'=> '???? ???????? ???? ???????? ?????????? ???????? ???? 225 ??????',
        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }  
            $subject=Subject::find($request->id);
            $subject->department_id = $request->department_id;
            $subject->doctor_id = $request->doctor_id;
            if(count($request->pre_id)>0)
            {
                $subject->requirments()->detach();
                $subject->requirments()->attach($request->pre_id);
            }          
            $subject->save();  
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject=Subject::find($id);
        if($subject->requirments->count()>0)
        {
            $subject->requirments()->detach();
        }
        if (is_dir(public_path('assets/images/data/subjects/' . $subject->id )) == true){
            File::DeleteDirectory(public_path('assets/images/data/subjects/' . $subject->id ));
        }
        $subject->delete();
        return Redirect()->route('admin.subjects');
    }
}
