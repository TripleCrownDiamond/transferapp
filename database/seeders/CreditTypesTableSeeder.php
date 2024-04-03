<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreditTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $creditTypes = [
            [
                'name' => 'personal',
                'description' => '',
            ],
            [
                'name' => 'real_estate_loan',
                'description' => '',
            ],
            [
                'name' => 'car_loan',
                'description' => 'A loan for purchasing a vehicle.',
            ],
            [
                'name' => 'debt_refinancing',
                'description' => '',
            ],
            [
                'name' => 'health',
                'description' => '',
            ],
            [
                'name' => 'car_financing',
                'description' => '',
            ],
            [
                'name' => 'project_financing',
                'description' => '',
            ],
            [
                'name' => 'student',
                'description' => '',
            ],
            [
                'name' => 'business_loan',
                'description' => '',
            ],
            [
                'name' => 'credit_card',
                'description' => '',
            ],
            [
                'name' => 'mortgage_loan',
                'description' => '',
            ],
            [
                'name' => 'emergency_loan',
                'description' => '',
            ],
            [
                'name' => 'payday_loan',
                'description' => '',
            ],
            [
                'name' => 'education_loan',
                'description' => '',
            ],
        ];

        foreach ($creditTypes as $creditType) {
            DB::table('credit_types')->insert($creditType);
        }
    }
}
