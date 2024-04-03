<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countries = [
            ['name' => 'France', 'iso_code' => 'FR', 'iban_check_digits' => '76', 'id_national_length' => 10, 'id_national_type' => 'numeric', 'phone_code' => '+33'],
            ['name' => 'Belgique', 'iso_code' => 'BE', 'iban_check_digits' => '68', 'id_national_length' => 11, 'id_national_type' => 'numeric', 'phone_code' => '+32'],
            ['name' => 'Suisse', 'iso_code' => 'CH', 'iban_check_digits' => '93', 'id_national_length' => 12, 'id_national_type' => 'numeric', 'phone_code' => '+41'],
            ['name' => 'Allemagne', 'iso_code' => 'DE', 'iban_check_digits' => '32', 'id_national_length' => 9, 'id_national_type' => 'numeric', 'phone_code' => '+49'],
        ];

        foreach ($countries as $country) {
            DB::table('countries')->insert([
                'name' => $country['name'],
                'iso_code' => $country['iso_code'],
                'iban_check_digits' => $country['iban_check_digits'],
                'id_national_length' => $country['id_national_length'],
                'id_national_type' => $country['id_national_type'],
                'phone_code' => $country['phone_code'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
