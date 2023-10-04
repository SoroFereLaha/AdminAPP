<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\matieres;

class Examens extends Model
{
    use HasFactory;

    public function matiere()
    {
        return $this->belongsTo(matieres::class, 'matiere_id');
    }
}
