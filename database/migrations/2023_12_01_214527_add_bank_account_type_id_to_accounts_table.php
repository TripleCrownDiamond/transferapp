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
        Schema::table('accounts', function (Blueprint $table) {
            $table->unsignedBigInteger('bank_account_type_id')->nullable();
            $table->foreign('bank_account_type_id')->references('id')->on('bank_account_types')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropForeign(['bank_account_type_id']);
            $table->dropColumn('bank_account_type_id');
        });
    }
};
