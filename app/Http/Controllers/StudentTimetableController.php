<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentTimetableController extends Controller
{
    public function list(){

        return view('emploiDuTemps');
    }
}
