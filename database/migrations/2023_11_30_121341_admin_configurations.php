<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_configurations', function (Blueprint $table) {
            $table->id();
            $table->boolean('user_active')->default(true);
            $table->boolean('account_active')->default(true);
            $table->boolean('manual_iban')->default(true);
            $table->boolean('manual_bic')->default(true);
            $table->foreignId('user_id')->nullable()->constrained();
            $table->boolean('request_otp')->default(false);
            $table->timestamps();
        });

        /*  // Ajouter une seule entrée avec les valeurs par défaut
         DB::table('user_configurations')->insert([
             'user_active' => true,
             'account_active' => true,
             'manual_iban' => true,
             'manual_bic' => true,
             'user_id' => null,
             'request_otp' => false,
             'created_at' => now(),
             'updated_at' => now(),
         ]); */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_configurations');
    }
};
