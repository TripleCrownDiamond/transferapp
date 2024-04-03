<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentCategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'identity_proof',
                'description' => 'Identity Proof Documents',
            ],
            [
                'name' => 'residence_proof',
                'description' => 'Residence Proof Documents',
            ],
            [
                'name' => 'selfie',
                'description' => 'Selfie',
            ],
            [
                'name' => 'others',
                'description' => 'Other Documents',
            ],
        ];

        foreach ($categories as $category) {
            DB::table('document_categories')->insert($category);
        }
    }
}
