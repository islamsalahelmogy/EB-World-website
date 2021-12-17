<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;




class UserController extends Controller
{
    public function index() {
        return view('user.profile');
    }

    public function settings() {
        $departments = Department::all();
        return view('user.setting',compact('departments'));
    }

    public function updateBasic(Request $request)
    {
            $validator = validator::make($request->all(),[
                'name' => ['required', 'string', 'max:15'],
                'email'   => 'required|email',     //|unique:users,email

            ],[
                'required' => 'ممنوع ترك الحقل فارغاَ',
                'string' => 'يجب الحقل ان يحتوى على رموز وارقام وحروف', 
            ]);
            if($validator->fails()) {
                return response()->json(['errors' => $validator->errors()]);
            }  
                $user=User::find(Auth::guard('user')->user()->id); 
                $user->name = $request->name;
                $user->email = $request->email;

                $user->level = $request->level != '' ? $request->level :null;
                $user->department = $request->department != '' && $request->department!='0' ?  $request->department :null;
                $user->save();
    }

    public function updateImage(Request $request)
    {
        if ($request->hasFile('image')) {
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
            
            $userId = Auth::guard('user')->user()->id;
            $file = $request->file('image');
            if (is_dir(public_path('assets/images/data/users/' . $userId )) == false) {
                mkdir(public_path('assets/images/data/users/' . $userId ));
            }
            $file_path = public_path('assets/images/data/users/' . $userId );
            $old_file = $file_path . '/' . Auth::guard('user')->user()->image;
            $file_name = str_replace([' ','#','&','=','?'],'-',$file->getClientOriginalName());
            $file->move($file_path, $file_name);
            $user = User::find($userId);
            $user->image = $file_name;
            $user->save();
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

            $user= Auth::guard('user')->user()->get;
            $user->password = Hash::make($r->new_password);
            $user->save();
        // return redirect()->route('user.profile');
    }




}
