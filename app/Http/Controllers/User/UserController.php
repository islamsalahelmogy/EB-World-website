<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('user.profile');
    }

    public function settings() {
        return view('user.setting');
    }
}
