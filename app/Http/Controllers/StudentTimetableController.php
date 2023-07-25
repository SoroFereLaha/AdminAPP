<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentTimetableController extends Controller
{
    public function list(){

        $data['header_title']= "Class timetable list ";
        return view('emploiDuTemps', $data);
    }
}
