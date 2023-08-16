<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\StudentTimetable;
use App\Models\TeacherTimetable;
use Illuminate\Support\Facades\Session;

class TeacherTimetableController extends Controller
{

    public function show()
    {
        // Récupérer les données de la base de données
        $teacherTimetables = TeacherTimetable::all();
        //dd($teacherTimetables);

        
        // Stoker les données dans la session
        //Session::put('teacherTimetables', $teacherTimetables);
        
        // Charger la vue de l'emploi du temps des professeurs et passer les données
        return view('emploiDuTempsProfesseur')->with('teacherTimetables', $teacherTimetables);
    }

    public function showDashboard()
    {

        // Récupérer les données de la session
        //$teacherTimetables = Session::get('teacherTimetables');

        $teacherTimetables = TeacherTimetable::all();
        $studentTimetables = StudentTimetable::all();

        //dd($teacherTimetables);
        
        // Charger la vue du tableau de bord et passer les données
        return view('dashboard', compact('teacherTimetables', 'studentTimetables'));
    }
    

    public function list(){
        
        return view('emploiDuTempsProfesseur');
    }

    public function add_timetable(Request $request){

        $request->validate([
            'jour' => ['required', Rule::notIn(['choisir'])],
            'heure_debut' => 'required',
            'heure_fin' => 'required',
            'salle' => 'required', //Rule::in(['Salle A', 'Salle B', 'Salle C', 'Salle D', ])],
            'professeur' => [
                'required',
                Rule::unique('teacher_timetables')->where(function ($query) use ($request) {
                    return $query->where('jour', $request->jour)
                        ->where('heure_debut', $request->heure_debut)
                        ->where('professeur', $request->professeur);
                }),
            ], //Rule::in(['Professeur A', 'Professeur B', 'Professeur C', 'Professeur D' ])],
            'matiere' => 'required', //Rule::in(['informatique', 'Patisserie', 'Cuisine', 'Couture', 'Beauté esthétique', 'Coiffure homme', 'Coiffure femme'])],
            'groupe' => [
                'required',
                Rule::unique('teacher_timetables')->where(function ($query) use ($request) {
                    return $query->where('jour', $request->jour)
                        ->where('heure_debut', $request->heure_debut)
                        ->where('groupe', $request->groupe);
                }),
            ],
            // Ajoutez d'autres règles de validation si nécessaire pour les jours 2 à 7
        ]);


        $teacherTimetable = new TeacherTimetable();
        
        $teacherTimetable->jour = $request->jour;
        $teacherTimetable->heure_debut = $request->heure_debut;
        $teacherTimetable->heure_fin = $request->heure_fin;
        $teacherTimetable->salle = $request->salle;
        $teacherTimetable->matiere = $request->matiere;
        $teacherTimetable->groupe = $request->groupe;
        $teacherTimetable->professeur = $request->professeur;

        $teacherTimetable->save();
        //dd($request->all());


        return redirect('/teacherTimetable/show')->with('status', 'L\'emploi du temps a été ajouté avec succès');
        
    }

    public function destroy($id)
    {
        try {
            TeacherTimetable::findOrFail($id)->delete();
            return redirect()->back()->with('status', 'Ligne supprimée avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la suppression');
        }
    } 
}
