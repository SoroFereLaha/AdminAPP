<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\StudentTimetable;

class StudentTimetableController extends Controller
{
    public function show()
    {
        $studentTimetables = StudentTimetable::all();
        //dd($studentTimetables);
        return view('emploiDuTempsEtudiant')->with('studentTimetables', $studentTimetables);
    }

    public function list(){
        
        return view('emploiDuTempsEtudiant');
    }

    public function add_timetable(Request $request){

        $request->validate([
            'jour' => 'required',
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'salle' => 'required', //Rule::in(['Salle A', 'Salle B', 'Salle C', 'Salle D', ])],
            'professeur' => 'required', //Rule::in(['Professeur A', 'Professeur B', 'Professeur C', 'Professeur D' ])],
            'matiere' => 'required', //Rule::in(['informatique', 'Patisserie', 'Cuisine', 'Couture', 'Beauté esthétique', 'Coiffure homme', 'Coiffure femme'])],
            'information' => 'required',
            // Ajoutez d'autres règles de validation si nécessaire pour les jours 2 à 7
        ]);


        $studentTimetable = new StudentTimetable();
        
        $studentTimetable->jour = $request->jour;
        $studentTimetable->heure_debut = $request->heure_debut;
        $studentTimetable->heure_fin = $request->heure_fin;
        $studentTimetable->salle = $request->salle;
        $studentTimetable->professeur = $request->professeur;
        $studentTimetable->matiere = $request->matiere;
        $studentTimetable->information = $request->information;

        $studentTimetable->save();
        //dd($request->all());


        return redirect('/studentTimetable/show')->with('status', 'L\'emploi du temps a été ajouté avec succès');
        
    }
}
