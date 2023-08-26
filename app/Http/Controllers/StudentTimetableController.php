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
            'heure_fin' => 'required', //Rule::in(['Salle A', 'Salle B', 'Salle C', 'Salle D', ])],
            'salle' => [
                'required',
                Rule::in(['Salle 1', 'Salle 2', 'Salle 3', 'Salle 4', ]),
                Rule::unique('student_timetables')->where(function ($query) use ($request) {
                    return $query->where('jour', $request->jour)
                        ->where('heure_debut', $request->heure_debut)
                        ->where('salle', $request->salle);
                }),
            ],
            'professeur' => [
                'required',
                Rule::unique('student_timetables')->where(function ($query) use ($request) {
                    return $query->where('jour', $request->jour)
                        ->where('heure_debut', $request->heure_debut)
                        ->where('professeur', $request->professeur);
                }),
            ], //Rule::in(['Professeur A', 'Professeur B', 'Professeur C', 'Professeur D' ])],
            'matiere' => [
                'required', 
                Rule::in(['informatique', 'Patisserie', 'Cuisine', 'Couture', 'Beauté esthétique', 'Coiffure homme', 'Coiffure femme']),
            ],
            'information' => 'nullable',
            'groupe' => [
                'required',
                Rule::in(['Groupe informatique A', 'Groupe informatique B', 'Groupe patisserie  X', 'Groupe patisserie  Y', 'Groupe cuisine X', 'Groupe cuisine Y', 'Groupe couture X', 'Groupe couture Y', 'Groupe beauté esthétique X', 'Groupe beauté esthétique Y', 'Groupe coiffure homme X', 'Groupe coiffure homme Y', 'Groupe coiffure femme X', 'Groupe coiffure femme Y' ]),
                Rule::unique('student_timetables')->where(function ($query) use ($request) {
                    return $query->where('jour', $request->jour)
                        ->where('heure_debut', $request->heure_debut)
                        ->where('groupe', $request->groupe);
                }),
            ],
            // Ajoutez d'autres règles de validation si nécessaire pour les jours 2 à 7
        ]);
        


        $studentTimetable = new StudentTimetable();
        
        $studentTimetable->jour = $request->jour;
        $studentTimetable->heure_debut = $request->heure_debut;
        $studentTimetable->heure_fin = $request->heure_fin;
        $studentTimetable->salle = $request->salle;
        $studentTimetable->professeur = $request->professeur;
        $studentTimetable->matiere = $request->matiere;
        $studentTimetable->groupe = $request->groupe;
        $studentTimetable->information = $request->information;

        $studentTimetable->save();
        //dd($request->all());


        return redirect('/studentTimetable/show')->with('status', 'L\'emploi du temps a été ajouté avec succès');
        
    }



    public function destroy($id)
    {
        try {
            StudentTimetable::findOrFail($id)->delete();
            return redirect()->back()->with('status', 'Ligne supprimée avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression');
        }
    }  
    
}
