<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $admin_principal = user::create([
            'name' => 'administrateur principal',
            'email' => 'admin_principal@adminprincipal.com',
            'photo_path' => 'adminapp_image/user.png',
            'password' => Hash::make('password')
        ]);

        $professeur = user::create([
            'name' => 'professeur',
            'email' => 'professeur@professeur.com',
            'photo_path' => 'adminapp_image/user.png',
            'password' => Hash::make('password')
        ]);
        
        $etudiant = user::create([
            'name' => 'etudiant',
            'email' => 'etudiant@etudiant.com',
            'photo_path' => 'adminapp_image/user.png',
            'password' => Hash::make('password')
        ]);

        $comptable = user::create([
            'name' => 'comptable',
            'email' => 'comptable@comptable.com',
            'photo_path' => 'adminapp_image/user.png',
            'password' => Hash::make('password')
        ]);

        $secretaire = user::create([
            'name' => 'secretaire',
            'email' => 'secretaire@secretaire.com',
            'photo_path' => 'adminapp_image/user.png',
            'password' => Hash::make('password')
        ]);

        $admin_general = user::create([
            'name' => 'administrateur general',
            'email' => 'admin_general@admingeneral.com',
            'photo_path' => 'adminapp_image/user.png',
            'password' => Hash::make('password')
        ]);

        $utilisateur = user::create([
            'name' => 'utilisateur',
            'email' => 'utilisateur@utilisateur.com',
            'photo_path' => 'adminapp_image/user.png',
            'password' => Hash::make('password')
        ]);
        
        $x = user::create([
            'name' => 'x',
            'email' => 'x@gmail.com',
            'photo_path' => 'adminapp_image/user.png',
            'password' => Hash::make('password')
        ]);

        $y = user::create([
            'name' => 'y',
            'email' => 'y@gmail.com',
            'photo_path' => 'adminapp_image/user.png',
            'password' => Hash::make('password')
        ]);

        $z = user::create([
            'name' => 'z',
            'email' => 'z@gmail.com',
            'photo_path' => 'adminapp_image/user.png',
            'password' => Hash::make('password')
        ]);

        $admin_principalRole = Role::where('name', 'administrateur principal')->first();
        $professeurRole = Role::where('name', 'professeur')->first();
        $etudiantRole = Role::where('name', 'etudiant')->first();
        $comptableRole = Role::where('name', 'comptable')->first();
        $secretaireRole = Role::where('name', 'secretaire')->first();
        $admin_generalRole = Role::where('name', 'administrateur general')->first();
        $utilisateurRole = Role::where('name', 'utilisateur')->first();
        $xRole = Role::where('name', 'utilisateur')->first();
        $yRole = Role::where('name', 'utilisateur')->first();
        $zRole = Role::where('name', 'utilisateur')->first();
        
        
        $admin_principal->roles()->attach($admin_principalRole);
        $professeur->roles()->attach($professeurRole);
        $etudiant->roles()->attach($etudiantRole);
        $comptable->roles()->attach($comptableRole);
        $secretaire->roles()->attach($secretaireRole);
        $admin_general->roles()->attach($admin_generalRole);
        $utilisateur->roles()->attach($utilisateurRole);
        $x->roles()->attach($xRole);
        $y->roles()->attach($yRole);
        $z->roles()->attach($zRole);

    }
}
