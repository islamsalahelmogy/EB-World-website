<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public function index() {
        return view('admin.profile');
    }

    public function settings() {
        return view('admin.setting');
    }

    public function updateBasic(Request $request)
    {
            $validator = validator::make($request->all(),[
                'name' => ['required', 'string', 'max:15'],
                'email'   => 'required|email|unique:admins,email,'.Auth::guard('admin')->user()->id
            ],[
                'required' => 'ممنوع ترك الحقل فارغاَ',
                'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف', 
            ]);
            if($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }  
                $admin=Admin::find(Auth::guard('admin')->user()->id); 
                $admin->name = $request->name;
                $admin->email = $request->email;
                $admin->save();
    }

    public function updateImage(Request $request)
    {
        

        
        if ($request->hasFile('image')) {
            //return response()->json(['data' => $request->image]);
            $Validator = validator::make($request->all(),[
                'image' => 'required|image|mimes:jpeg,jpg,png',
            ],[
                'required' => 'ممنوع ترك الحقل فارغاَ',
                'image'=>'لابد ان تكون صورة ',
                'mimes' => 'لا بد ان يكون نوع الملف jpeg او jpg أو png'
            ]);
            if($Validator->fails()) {
                return response()->json(['errors' => $Validator->errors()]);
            }
            $adminId = Auth::guard('admin')->user()->id;
            $file = $request->file('image');
            if (is_dir(public_path('assets/images/data/admins/' . $adminId )) == false) {
                mkdir(public_path('assets/images/data/admins/' . $adminId ));
            }
            $file_path = public_path('assets/images/data/admins/' . $adminId );
            $old_file = $file_path . '/' . Auth::guard('admin')->user()->image;
            $file_name = str_replace([' ','#','&','=','?'],'-',$file->getClientOriginalName());
            $file->move($file_path, $file_name);
            $admin = Admin::find($adminId);
            $admin->image = $file_name;
            $admin->save();
            if (file_exists($old_file)) {
                File::delete($old_file);
            }
        }
        
    }

    public function changePassword(Request $r) {
        $validator = Validator::make($r->all(),[
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

            $admin_id= Auth::guard('admin')->user()->id;
            $admin=Admin::find($admin_id);
            $admin->password = Hash::make($r->new_password);
            $admin->save();
        // return redirect()->route('user.profile');
    }
}
