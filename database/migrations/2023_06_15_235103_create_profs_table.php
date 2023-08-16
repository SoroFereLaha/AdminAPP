<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('profs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->integer('age')->nullable();
            $table->string('email')->nullable();
            $table->integer('class')->nullable();
            $table->unsignedBigInteger('matiere_id')->nullable(); // Nouvelle colonne pour la clé étrangère
            $table->timestamps();

            // Contrainte de clé étrangère
            //$table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profs');
    }
};


