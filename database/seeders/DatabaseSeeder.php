<?php

use Database\Seeders\BankAccountTypesSeeder;
use Database\Seeders\CreditConfigurationsSeeder;
use Illuminate\Database\Seeder;

// Ajoutez les déclarations use pour chaque seeder ici
use Database\Seeders\SuperAdminSeeder;
use Database\Seeders\CountriesTableSeeder;
use Database\Seeders\CreditTypesTableSeeder;
use Database\Seeders\CurrenciesTableSeeder;
use Database\Seeders\DocumentCategorySeeder;
use Database\Seeders\DocumentTypeSeeder;
use Database\Seeders\LanguageSeeder;
use Database\Seeders\AppConfigurationsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SuperAdminSeeder::class,
            CountriesTableSeeder::class,
            CurrenciesTableSeeder::class,
            LanguageSeeder::class,
            CreditTypesTableSeeder::class,
            DocumentCategorySeeder::class,
            DocumentTypeSeeder::class,
            AppConfigurationsSeeder::class,
            CreditConfigurationsSeeder::class,
            BankAccountTypesSeeder::class

            // Ajoutez d'autres seeders au besoin
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
