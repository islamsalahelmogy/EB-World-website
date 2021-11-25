<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /* home page */
    public function index() {
        return view('app.home'); 
    }

    /* inquire page */
    public function show_inquires() {
        return view('app.inquires'); 
    }

    /*all departments page */
    public function show_alldepartments() {
        return view('app.alldepartments'); 
    }
    /* all subjects page  */
    public function show_allsubjects() {
        return view('app.allsubjects'); 
    }

    /* all doctors page  */
    public function show_alldoctors() {
        return view('app.alldoctors'); 
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
    public function show_subject() {
        return view('app.subject'); 
    }

   

}
