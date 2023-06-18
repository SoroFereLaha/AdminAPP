<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prof;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom', 'age', 'genre', 'prof_id'];

    public function teacher()
    {
        return $this->belongsTo(Prof::class);
    }
}
