<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    
    public function photo_path()
    {
        // Remplacez 'photo_path' par le nom du champ qui contient le chemin de la photo de profil dans votre table users.
        return $this->attributes['photo_path'];
    }

    //verifier si un utilisateur est administrateur ou non
    public function isAdminPrincipal(){
        return $this->roles()->where('name', 'administrateur principal')->first();
    }

    public function isAdminGeneral(){
        return $this->roles()->where('name', 'administrateur general')->first();
    }

    public function isEtudiant(){
        return $this->roles()->where('name', 'etudiant')->first();
    }

    public function isProfesseur(){
        return $this->roles()->where('name', 'professeur')->first();
    }

    public function isComptable(){
        return $this->roles()->where('name', 'comptable')->first();
    }

    public function isSecretaire(){
        return $this->roles()->where('name', 'secretaire')->first();
    }

    public function isUtilisateur(){
        return $this->roles()->where('name', 'utilisateur')->first();
    }

    public function hasAnyRole(array $roles){
        return $this->roles()->whereIn('name', $roles)->first();
    }

}
