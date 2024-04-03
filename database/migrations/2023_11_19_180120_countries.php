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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('iso_code', 2); // Code ISO du pays (par exemple, FR pour la France)
            $table->string('iban_check_digits', 2); // Chiffres de contrôle de l'IBAN
            $table->integer('id_national_length'); // Longueur de l'identifiant national
            $table->enum('id_national_type', ['numeric', 'alphanumeric']); // Type d'identifiant national (numérique ou alphanumérique)
            $table->string('phone_code'); // Indicatif téléphonique du pays
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
