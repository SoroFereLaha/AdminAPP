<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SecretariatController extends Controller
{
    public function index() {

        return view('admin.users.secretariats.secretariat',);
        
    }

    public function inscrit()
    {

        return view('admin.users.secretariats.inscriptions',);
    }

    public function ajoutEt()
    {
        return view('admin.users.secretariats.formEtudiant',);
    }

    public function ajoutProf()
    {
        return view('admin.users.secretariats.formProf',);
    }

    public function ajoutMatière()
    {
        return view('admin.users.secretariats.formMatière',);
    }

}
