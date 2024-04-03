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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('country_id')->nullable()->constrained();
            $table->string('city')->nullable();
            $table->string('adress_line1')->nullable();
            $table->string('adress_line2')->nullable();
            $table->string('post_code')->nullable();
            $table->string('account_number', 20)->nullable()->unique(); // Assumant une longueur maximale de 20 caractères
            $table->string('iban', 34)->nullable()->unique(); // Assumant une longueur maximale de 34 caractères
            $table->boolean('is_active')->default(true);
            $table->decimal('balance', 10, 2)->default(0);
            $table->foreignId('currency_id')->nullable()->constrained('currencies');
            $table->integer('profile_completion_percentage')->default(10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
