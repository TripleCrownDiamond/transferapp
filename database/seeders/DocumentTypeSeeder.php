<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $documentTypes = [
            [
                'name' => 'Passport',
                'document_category_id' => 1,
                'description' => 'Passport Document',
            ],
            [
                'name' => 'Driver License',
                'document_category_id' => 1,
                'description' => 'Driver License Document',
            ],
            [
                'name' => 'Identity Card',
                'document_category_id' => 1,
                'description' => 'Identity Card Document',
            ],
            [
                'name' => 'Utility Bill',
                'document_category_id' => 2,
                'description' => 'Utility Bill Document',
            ],
            [
                'name' => 'Bank Statement',
                'document_category_id' => 2,
                'description' => 'Bank Statement Document',
            ],
            [
                'name' => 'Selfie',
                'document_category_id' => 3,
                'description' => 'Selfie',
            ],
            [
                'name' => 'Other Document',
                'document_category_id' => 4,
                'description' => 'Other Document',
            ],
        ];

        foreach ($documentTypes as $type) {
            $type['slug'] = Str::slug($type['name']);
            DB::table('document_types')->insert($type);
        }
    }
}
