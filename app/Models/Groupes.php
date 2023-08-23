<?php

namespace App\Models;

use App\Models\matieres;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupes extends Model
{
    use HasFactory;

    public function matieres()
    {
        return $this->belongsToMany(matieres::class, 'matiere_groupe', 'groupe_id', 'matiere_id');
    }

}
