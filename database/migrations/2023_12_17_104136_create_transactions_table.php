<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('account_id')->constrained(); // Clé étrangère liée à la table des comptes
            $table->decimal('amount', 10, 2); // Montant de la transaction
            $table->enum('type', ['debit', 'credit']); // Type de transaction (débit ou crédit)
            $table->enum('status', ['pending', 'complete', 'failed']); // Statut de la transaction
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
