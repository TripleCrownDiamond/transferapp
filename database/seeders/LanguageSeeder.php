<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $languages = [
            ['name' => 'English', 'code' => 'en', 'flag_emoji' => '🇺🇸'],
            ['name' => 'French', 'code' => 'fr', 'flag_emoji' => '🇫🇷'],
            ['name' => 'Spanish', 'code' => 'es', 'flag_emoji' => '🇪🇸'],
            ['name' => 'German', 'code' => 'de', 'flag_emoji' => '🇩🇪'],
            ['name' => 'Italian', 'code' => 'it', 'flag_emoji' => '🇮🇹'],
            ['name' => 'Portuguese', 'code' => 'pt', 'flag_emoji' => '🇵🇹'],
            ['name' => 'Japanese', 'code' => 'ja', 'flag_emoji' => '🇯🇵'],
            ['name' => 'Chinese', 'code' => 'zh', 'flag_emoji' => '🇨🇳'],
            ['name' => 'Russian', 'code' => 'ru', 'flag_emoji' => '🇷🇺'],
            ['name' => 'Korean', 'code' => 'ko', 'flag_emoji' => '🇰🇷'],
        ];

        foreach ($languages as $language) {
            DB::table('languages')->insert($language);
        }
    }
}