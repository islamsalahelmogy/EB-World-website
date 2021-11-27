<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\Inquiry;
use App\Models\Level;
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
        $inquiries = Inquiry::all();
        return view('app.inquires',compact('inquiries')); 
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
    public function show_doctor(Request $r) {
        if(is_numeric($r->id)) {
            $doctor = Doctor::find($r->id);
            return view('app.doctor',compact('doctor')); 
        } else {
            return redirect()->route('error');
        }
    }

     /* single department with doctors and subjects */
     public function show_department(Request $r) {
        if(is_numeric($r->id)) {
            $department = Department::find($r->id);
            $levels = Level::all();
            return view('app.department',compact('department','levels')); 
        } else {
            return redirect()->route('error');
        }
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
