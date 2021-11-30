<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }




    public function showRegister () {
        return view ('layout.auth.register');
    }


    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:15'],
            'email'   => 'required|email|unique:users,email',
            'gender' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required', 'string', 'min:8','same:password']
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
            'email' => 'هذا الإيميل غير صحيح',
            'unique' => 'هذا الايميل مكرر فى الموقع',
            'same'=> 'كلمة السر غير مطابقة '

        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'gender' => $request['gender'],
            'password' => Hash::make($request['password']),
        ]);
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) 
        {
            return redirect()->route('home');
        }
    }
}
