<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->enum('card_type', ['visa', 'mastercard', 'others']); // Remplacez 'autre' par d'autres types si nécessaire
            $table->enum('status', ['active', 'inactive', 'suspended']); // Remplacez 'autre' par d'autres types si nécessaire
            $table->string('card_number');
            $table->string('card_expiry_date');
            $table->string('card_cryptogram_cvv');
            $table->decimal('card_balance', 10, 2);
            $table->unsignedBigInteger('account_id');
            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
};
