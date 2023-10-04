<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->string('Salle');
            $table->string('info')->nullable();
            $table->longText('groupe');
            $table->unsignedBigInteger('matiere_id');
            $table->timestamps();

            // Contrainte de clé étrangère
            $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examens');
    }
};
