<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    public function index()
    {
        return view('admin.users.administration.convocation',);
    }

    public function examens()
    {
        return view('admin.users.administration.examens',);
    }
}
