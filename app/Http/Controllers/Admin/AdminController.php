<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
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


    public function updateBasic(Request $request)
    {
            $validator = validator::make($request->all(),[
                'name' => ['required', 'string', 'max:15'],
                'email'   => 'required|email|unique:users,email',

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
        dd($request->all());
        if ($request->hasFile('image')) {
        $Validator = validator::make($request->all(),[
            'image' => 'required','image','mimes:jpeg,png,jpg,svg','max:2048',
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'mimetypes' => 'لا بد ان يكون نوع الملف mp4 او mkv'
        ]);
        if($Validator->fails()){
            return Redirect::back()->withErrors($Validator)->withInput($request->all());
        }

            $userId = Auth::user()->id;
            $file = $request->file('image');
            if (is_dir(public_path('public\assets\images\data\users\\' . $userId . '\images')) == false) {
                mkdir(public_path('public\assets\images\data\users\\' . $userId  . '\images'));
            }
            $file_path = public_path('public\assets\images\data\users\\' . $userId . '\images');
            $old_file = $file_path . '\\' . Auth::user()->image;
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

            $user= Auth::user()->get;
            $user->password = Hash::make($r->new_password);
            $user->save();
        // return redirect()->route('user.profile');
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
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
