<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\UpdateDoctorRequest;

use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        $departments = Department::all();
        return view('admin.doctors.index',compact('doctors','departments'));
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
     * @param  \App\Http\Requests\StoreDoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name' => ['required', 'string','unique:doctors,name'],
            'email'   => 'required|email|unique:doctors,email',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'gender' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:8'],
            'department_id' => ['required', 'string', 'max:255'],
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف', 
            'unique' => 'هذا المستوي مكرر فى الموقع',
            'image'=>'لابد ان تكون صورة ',
            'mimes' => 'لا بد ان يكون نوع الملف jpeg او jpg أو png',
            'numeric' => 'يجب ان يحتوى الحقل على ارقام فقط',
            'phone.digits' => 'الرقم غير صحيح لابد ان يكون مكون من 8 خانات',
            'max'=> 'لا يمكن ان يكون الحقل اكبر من 225 حرف',
            'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } 
            $doctor=new Doctor();
            $doctor->name = $request->name;
            $doctor->email = $request->email;
            $doctor->gender = $request->gender;
            $doctor->phone = $request->phone;
            $doctor->department_id = $request->department_id;
            $doctor->save();

            $doctorId = $doctor->id;
            $file = $request->file('image');
            if (is_dir(public_path('assets/images/data/doctors/' . $doctorId )) == false) {
                mkdir(public_path('assets/images/data/doctors/' . $doctorId ));
            }
            $file_path = public_path('assets/images/data/doctors/' . $doctorId );
            $old_file = $file_path . '/' . $doctor->image;
            $file_name = str_replace([' ','#','&','=','?'],'-',$file->getClientOriginalName());
            $file->move($file_path, $file_name);
            
            $doctor->image = $file_name;
            $doctor->save();
            if (file_exists($old_file)) {
                File::delete($old_file);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor=Doctor::find($id);
        $departments=Department::all();
        return view('admin.doctors.edit',compact('doctor','departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorRequest  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */

    public function updateImage(Request $request)
    {
        $doctor=Doctor::find($request->id);
        $doctorId = $doctor->id;
            $file = $request->file('image');
            if (is_dir(public_path('assets/images/data/doctors/' . $doctorId )) == false) {
                mkdir(public_path('assets/images/data/doctors/' . $doctorId ));
            }
            $file_path = public_path('assets/images/data/doctors/' . $doctorId );
            $old_file = $file_path . '/' . $doctor->image;
            $file_name = str_replace([' ','#','&','=','?'],'-',$file->getClientOriginalName());
            $file->move($file_path, $file_name);
            
            $doctor->image = $file_name;
            $doctor->save();
            if (file_exists($old_file)) {
                File::delete($old_file);
            }
    }

    public function updateBasic(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name' => ['required', 'string'],
            'email'   => 'required|email',
            'gender' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:8'],
            'department_id' => ['required', 'string', 'max:255'],
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف', 
            'unique' => 'هذا المستوي مكرر فى الموقع',
            'image'=>'لابد ان تكون صورة ',
            'mimes' => 'لا بد ان يكون نوع الملف jpeg او jpg أو png',
            'numeric' => 'يجب ان يحتوى الحقل على ارقام فقط',
            'phone.digits' => 'الرقم غير صحيح لابد ان يكون مكون من 8 خانات',
            'max'=> 'لا يمكن ان يكون الحقل اكبر من 225 حرف',
            'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',

        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }  
            $doctor=Doctor::find($request->id);
            $doctor->name = $request->name;
            $doctor->email = $request->email;
            $doctor->gender = $request->gender;
            $doctor->phone = $request->phone;
            $doctor->department_id = $request->department_id;
            $doctor->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor=Doctor::find($id);
        if (is_dir(public_path('assets/images/data/doctors/' . $doctor->id )) == true){
        File::DeleteDirectory(public_path('assets/images/data/doctors/' . $doctor->id ));
        }
        $doctor->delete();
        return Redirect()->route('admin.doctors');
    }
}
