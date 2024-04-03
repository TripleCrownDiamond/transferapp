<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_configurations', function (Blueprint $table) {
            $table->id();
            $table->boolean('user_active')->default(true);
            $table->boolean('account_active')->default(true);
            $table->boolean('request_otp')->default(false);
            $table->timestamps();
        });

        // Ajouter une seule entrée avec les valeurs par défaut
        DB::table('user_configurations')->insert([
            'user_active' => true,
            'account_active' => true,
            'request_otp' => false,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_configurations');
    }
};