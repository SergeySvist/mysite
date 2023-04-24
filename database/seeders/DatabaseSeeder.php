<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\FileType;
use App\Models\Language;
use App\Models\Link;
use App\Models\MimeType;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            FileTypeSeeder::class,
            LanguageSeeder::class,
            LinkSeeder::class,
            MimeTypeSeeder::class,
            TagSeeder::class,
        ]);
    }
}
