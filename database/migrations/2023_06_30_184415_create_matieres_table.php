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
        Schema::create('matieres', function (Blueprint $table) {
            $table->id();
            $table->string("nom")->unique();
            $table->longText("description")->nullable();
            $table->char('groupes')->nullable();
            $table->unsignedBigInteger('prof_id')->nullable(); // Nouvelle colonne pour la clé étrangère
            $table->timestamps();

            // Contrainte de clé étrangère
            $table->foreign('prof_id')->references('id')->on('profs')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matieres');
    }
};

