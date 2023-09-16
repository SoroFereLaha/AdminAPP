<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prof;
use App\Models\Absence;
use App\Models\Payement;
use App\Models\matieres;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom', 'age', 'genre', 'prof_id', 'matieres_groupes']; 

    public function teacher()
    {
        return $this->belongsTo(Prof::class);
    }

    public function matieres()
    {
        return $this->belongsToMany(matieres::class, 'etudiant_matiere', 'etudiant_id', 'matiere_id');

    }

    public function absences()
    {
        return $this->hasMany(Absence::class, 'etudiant_id');
    }
    
    public function payement()
    {
        return $this->hasMany(Payement::class, 'etudiant_id');
    }
}
