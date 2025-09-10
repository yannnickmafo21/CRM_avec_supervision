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
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique()->isNotEmpty();
            $table->string('prenom')->isNotEmpty();
            $table->string('password')->isNotEmpty();
            $table->string('email')->unique()->isNotEmpty();
            $table->string('phone')->isNotEmpty();
            $table->string('fonction')->default('service_client')->isNotEmpty();
            $table->string('domicile');
            $table->string('sexe')->default('Masculin')->enum('Masculin', 'Feminin');
            $table->string('token')->unique();
            $table->string('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
