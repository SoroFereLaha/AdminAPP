<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentTimetable extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'heure_debut',
        'heure_fin',
        'salle',
        'professeur',
        'matiere',
        'groupe',
        'information',
    ];
}
