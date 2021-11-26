<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('user.profile');
    }

    public function settings() {
        $departments = Department::all();
        return view('user.setting',compact('departments'));
    }
}
