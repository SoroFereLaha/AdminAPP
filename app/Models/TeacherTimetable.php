<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherTimetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'heure_debut',
        'heure_fin',
        'salle',
        'matiere',
    ];
}
