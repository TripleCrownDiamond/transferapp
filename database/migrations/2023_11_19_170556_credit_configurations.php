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
        Schema::create('credit_configurations', function (Blueprint $table) {
            $table->id();
            $table->decimal('interest_rate', 5, 2);
            $table->integer('grace_period');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('credit_configurations');
    }
};
