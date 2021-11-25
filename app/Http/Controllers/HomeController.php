<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\Inquiry;
use App\Models\Subject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /* home page */
    public function index() {
        $departments = Department::all();
        $doctors = Doctor::all();
        $inquiries = Inquiry::latest()->take(10)->get(); 
        return view('app.home',compact('departments','doctors','inquiries')); 
    }

    /* inquire page */
    public function show_inquires() {
        return view('app.inquires'); 
    }

    /*all departments page */
    public function show_alldepartments() {
        $departments = Department::all();
        return view('app.alldepartments',compact('departments')); 
    }
    /* all subjects page  */
    public function show_allsubjects() {
        $departments = Department::all();
        return view('app.allsubjects',compact('departments')); 
    }

    /* all doctors page  */
    public function show_alldoctors() {
        $doctors = Doctor::all();
        return view('app.alldoctors',compact('doctors')); 
    }

    /* single doctor with subjects */
    public function show_doctor() {
        return view('app.doctor'); 
    }

     /* single department with doctors and subjects */
     public function show_department() {
        return view('app.department'); 
    }

    /* content for subject */
    public function show_subject(Request $r) {
        if(is_numeric($r->id)) {
            $subject = Subject::find($r->id);
            return view('app.subject',compact('subject')); 
        } else {
            return redirect()->route('error');
        }
            
        
    }

    public function getError() {
        abort(404);
    }

   

}
