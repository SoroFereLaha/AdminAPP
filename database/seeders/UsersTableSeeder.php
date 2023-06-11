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

        $admin = user::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);

        $professeur = user::create([
            'name' => 'professeur',
            'email' => 'professeur@professeur.com',
            'password' => Hash::make('password')
        ]);
        
        $etudiant = user::create([
            'name' => 'etudiant',
            'email' => 'etudiant@etudiant.com',
            'password' => Hash::make('password')
        ]);

        $adminRole = Role::where('name', 'admin')->first();
        $professeurRole = Role::where('name', 'professeur')->first();
        $etudiantRole = Role::where('name', 'etudiant')->first();

        $admin->roles()->attach($adminRole);
        $professeur->roles()->attach($professeurRole);
        $etudiant->roles()->attach($etudiantRole);

    }
}
