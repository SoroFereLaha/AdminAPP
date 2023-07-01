<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;
use App\Models\Matieres;

class Prof extends Model
{
    use HasFactory;

    public function matiere()
    {
        return $this->hasOne(Matieres::class, 'prof_id', 'id');
    }

    public function students()
    {
        return $this->hasMany(Etudiant::class, 'prof_id', 'id');
    }
}
