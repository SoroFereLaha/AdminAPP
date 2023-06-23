<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::truncate();

        Role::create(['name' => 'administrateur principal']);
        Role::create(['name' => 'professeur']);
        Role::create(['name' => 'etudiant']);
        Role::create(['name' => 'comptable']);
        Role::create(['name' => 'secretaire']);
        Role::create(['name' => 'administrateur general']);
        Role::create(['name' => 'utilisateur']);
    }
}
