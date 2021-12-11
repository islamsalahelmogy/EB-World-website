<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Department;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;



class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.index',compact('departments'));
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
     * @param  \App\Http\Requests\StoreDepartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name' => ['required', 'string','unique:departments,name'],
            'description'=> 'required',
            'cover' => 'required|image|mimes:jpeg,jpg,png',
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف', 
            'unique' => 'هذا المستوي مكرر فى الموقع',
            'image'=>'لابد ان تكون صورة ',
            'mimes' => 'لا بد ان يكون نوع الملف jpeg او jpg أو png'
        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } 
            $department=new Department();
            $department->name = $request->name;
            $department->description = $request->description;
            $department->save();

            $departmenId = $department->id;
            $file = $request->file('cover');
            if (is_dir(public_path('assets/images/data/departments/' . $departmenId )) == false) {
                mkdir(public_path('assets/images/data/departments/' . $departmenId ));
            }
            $file_path = public_path('assets/images/data/departments/' . $departmenId );
            $old_file = $file_path . '/' . $department->cover;
            $file_name = str_replace([' ','#','&','=','?'],'-',$file->getClientOriginalName());
            $file->move($file_path, $file_name);
            
            $department->cover = $file_name;
            $department->save();
            if (file_exists($old_file)) {
                File::delete($old_file);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department=Department::find($id);
        return view('admin.departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepartmentRequest  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function updateBasic(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name' => ['required', 'string','unique:departments,name'],
            'description' => ['required']
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف', 
            'unique' => 'هذا التخصص مكرر فى الموقع',

        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }  
            $level=Department::find($request->id);
            $level->name = $request->name;
            $level->description = $request->description;
            $level->save();
    }

    public function updateImage(Request $request)
    {
        $department=Department::find($request->id);
        $departmenId = $department->id;
            $file = $request->file('cover');
            if (is_dir(public_path('assets/images/data/departments/' . $departmenId )) == false) {
                mkdir(public_path('assets/images/data/departments/' . $departmenId ));
            }
            $file_path = public_path('assets/images/data/departments/' . $departmenId );
            $old_file = $file_path . '/' . $department->cover;
            $file_name = str_replace([' ','#','&','=','?'],'-',$file->getClientOriginalName());
            $file->move($file_path, $file_name);
            
            $department->cover = $file_name;
            $department->save();
            if (file_exists($old_file)) {
                File::delete($old_file);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department=Department::find($id);
        $department->delete();
        return Redirect()->route('admin.departments');
    }
}

