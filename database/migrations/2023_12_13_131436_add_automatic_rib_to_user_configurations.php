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
        Schema::table('user_configurations', function (Blueprint $table) {
            $table->boolean('automatic_rib')->default(1)->after('account_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_configurations', function (Blueprint $table) {
            $table->dropColumn('automatic_rib');
        });
    }
};
