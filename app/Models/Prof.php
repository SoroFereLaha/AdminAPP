<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;

class Prof extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->hasMany(Etudiant::class, 'prof_id', 'id');
    }
}
