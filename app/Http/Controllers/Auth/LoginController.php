<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except(['adminLogout','adminResetPassword','adminCahngePassword']);
        $this->middleware('guest:user')->except(['userLogout','userResetPassword','userCahngePassword']);
   }


    public function showLogin () {
        return view ('layout.auth.login');
    }


     public function adminLogin(Request $request)
    {
        $validator = Validator::make($request->all(),[
            
                'email_admin'   => 'required|email|exists:admins,email',
                'password_admin' => 'required|min:8'
            
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
            'email' => 'هذا الإيميل غير صحيح',
            'exists' => 'هذا الايميل غير مسجل فى الموقع'

        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        if (Auth::guard('admin')->attempt(['email' => $request->email_admin, 'password' => $request->password_admin])) {

            return redirect()->route('home');
        } else {
            return response()->json(['errors' => ['invalid_admin' => ['الإيميل غير موجود']]]);

        }
        //return back()->withInput($request->only('email'));
    }

    public function adminLogout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        
        return redirect('/');
    }


    public function userLogin(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'email_user'   => 'required|email|exists:users,email',
            'password_user' => 'required|min:8'
        ],[
            'required' => 'ممنوع ترك الحقل فارغاَ',
            'min' => 'لابد ان يكون الحقل مكون على الاقل من 8 خانات',
            'email' => 'هذا الإيميل غير صحيح',
            'exists' => 'هذا الايميل غير مسجل فى الموقع'

        ]);
        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        if (Auth::guard('user')->attempt(['email' => $request->email_user, 'password' => $request->password_user])) {

            return redirect()->route('home');
        } else {
            return response()->json(['errors' => ['invalid_user' => ['الإيميل غير موجود']]]);
        }
        //return back()->withInput($request->only('email'));
    }

    public function userLogout(Request $request){
    
        Auth::guard('user')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }




}
