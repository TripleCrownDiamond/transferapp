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
        Schema::table('app_configurations', function (Blueprint $table) {
            $table->string('code_banque')->nullable()->default('6725');
            $table->string('code_guichet')->nullable()->default('00296');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('app_configurations', function (Blueprint $table) {
            $table->dropColumn('code_banque');
            $table->dropColumn('code_guichet');
        });
    }
};
