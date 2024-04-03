<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BankAccountTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bank_account_types')->insert([
            ['name' => 'Checking'],
            ['name' => 'Savings'],
            ['name' => 'Business'],
            ['name' => 'Student'],
            ['name' => 'Joint'],
            ['name' => 'Money Market'],
            ['name' => 'Current'], // Ajout du type de compte "Courant"
            // Ajoutez d'autres types de compte si nécessaire
        ]);
    }
}
