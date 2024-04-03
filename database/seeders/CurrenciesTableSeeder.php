<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            ['code' => 'USD', 'name' => 'US Dollar'],
            ['code' => 'EUR', 'name' => 'Euro'],
            ['code' => 'GBP', 'name' => 'British Pound'],
            ['code' => 'JPY', 'name' => 'Japanese Yen'],
            ['code' => 'AUD', 'name' => 'Australian Dollar'],
            ['code' => 'CAD', 'name' => 'Canadian Dollar'],
            ['code' => 'CHF', 'name' => 'Swiss Franc'],
            ['code' => 'CNY', 'name' => 'Chinese Yuan'],
            ['code' => 'INR', 'name' => 'Indian Rupee'],
            ['code' => 'BRL', 'name' => 'Brazilian Real'],
        ];

        foreach ($currencies as $currency) {
            DB::table('currencies')->insert([
                'code' => $currency['code'],
                'name' => $currency['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
