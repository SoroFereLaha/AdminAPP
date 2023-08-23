<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prof;
use App\Models\Etudiant;
use App\Models\Groupes;

class matieres extends Model
{
    use HasFactory;

    public function prof()
    {
        return $this->belongsTo(Prof::class, 'prof_id', 'id');
    }

    public function etudiants()
    {
        return $this->belongsToMany(Etudiant::class, 'etudiant_matiere', 'matiere_id', 'etudiant_id');
    }

    public function groupes()
    {
        return $this->belongsToMany(Groupes::class, 'matiere_groupe', 'matiere_id','groupe_id');
    }

}
