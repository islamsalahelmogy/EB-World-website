<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;




class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::where('id','!=','1')->get();
        return view('admin.admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name' => ['required', 'string'],
            'email'   => 'required|email|unique:admins,email',
            'image' => 'required|image|mimes:jpeg,jpg,png',
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required', 'string', 'min:8','same:password']
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف', 
            'image'=>'لابد ان تكون صورة ',
            'mimes' => 'لا بد ان يكون نوع الملف jpeg او jpg أو png',
            'unique' => 'هذا الايميل مكرر فى الموقع',
            'same'=> 'كلمة السر غير مطابقة '
        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } 
            $admin=new Admin();
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = Hash::make($request->password);
            $admin->save();

            $adminId = $admin->id;
            $file = $request->file('image');
            if (is_dir(public_path('assets/images/data/admins/' . $adminId )) == false) {
                mkdir(public_path('assets/images/data/admins/' . $adminId ));
            }
            $file_path = public_path('assets/images/data/admins/' . $adminId );
            $old_file = $file_path . '/' . $admin->image;
            $file_name = str_replace([' ','#','&','=','?'],'-',$file->getClientOriginalName());
            $file->move($file_path, $file_name);
            
            $admin->image = $file_name;
            $admin->save();
            if (file_exists($old_file)) {
                File::delete($old_file);
            }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin=Admin::find($id);
        return view('admin.admins.edit',compact('admin'));
    }

    
    public function updateImageAdmin(Request $request)
    {
        $admin=Admin::find($request->id);
        $adminId = $admin->id;
        $file = $request->file('image');
        if (is_dir(public_path('assets/images/data/admins/' . $adminId )) == false) {
            mkdir(public_path('assets/images/data/admins/' . $adminId ));
        }
        $file_path = public_path('assets/images/data/admins/' . $adminId );
        $old_file = $file_path . '/' . $admin->image;
        $file_name = str_replace([' ','#','&','=','?'],'-',$file->getClientOriginalName());
        $file->move($file_path, $file_name);
        
        $admin->image = $file_name;
        $admin->save();
        if (file_exists($old_file)) {
            File::delete($old_file);
        }
    }

    public function updateBasicAdmin(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name' => ['required', 'string'],
            'email'   => 'required|email|unique:admins,email,'.$request->id
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف', 
            'unique' => 'هذا الايميل مكرر فى الموقع',
        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }  
            $admin=Admin::find($request->id);
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->save();
    }

    public function updatePassAdmin(Request $request) 
    {
        $validator = Validator::make($request->all(),[
            'new_password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required', 'string', 'min:8','same:new_password']
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
            'email' => 'هذا الإيميل غير صحيح',
            'exists' => 'هذا الايميل غير مسجل فى الموقع',
            'same'=> 'كلمة السر غير مطابقة '

        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $admin=Admin::find($request->id);
        $admin->password = Hash::make($request->new_password);
        $admin->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin=Admin::find($id);
        if (is_dir(public_path('assets/images/data/admins/' . $admin->id )) == true){
        File::DeleteDirectory(public_path('assets/images/data/admins/' . $admin->id ));
        }
        $admin->delete();
        return Redirect()->route('admin.admins');
    }
}
