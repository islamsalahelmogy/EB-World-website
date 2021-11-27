<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Inquiry;
use App\Models\Level;
use App\Models\Reply;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        $doctors = Doctor::all();
        $levels = Level::all();
        $departments = Department::all();
        $users = User::all();
        $replies = Reply::all();
        $inqs = Inquiry::all();


        return view('admin.dashboard',compact('subjects','doctors','levels','departments','users','replies','inqs'));
    }
}
