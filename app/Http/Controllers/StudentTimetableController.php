<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentTimetable;

class StudentTimetableController extends Controller
{
    public function list(){
        
        return view('emploiDuTemps');
    }

    public function add_timetable(Request $request){

        $request->validate([
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'salle' => 'required',
            'professeur' => 'required',
            'matiere' => 'required',
            'information' => 'required',
        ]);

        $studentTimetable = new StudentTimetable();
        
        $studentTimetable->heure_debut = $request->heure_debut;
        $studentTimetable->heure_fin = $request->heure_fin;
        $studentTimetable->salle = $request->salle;
        $studentTimetable->professeur = $request->professeur;
        $studentTimetable->matiere = $request->matiere;
        $studentTimetable->information = $request->information;

        $studentTimetable->save();

        return redirect('/StudentTimetable')->with('status', 'L\'emploi du temps a été ajouté avec succès');
        
    }
}
