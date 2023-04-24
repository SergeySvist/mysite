<?php

namespace Database\Seeders;

use App\Models\MimeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MimeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MimeType::create(['title' => 'application/json']);
        MimeType::create(['title' => 'application/pdf']);
        MimeType::create(['title' => 'image/png']);
        MimeType::create(['title' => 'image/jpg']);
        MimeType::create(['title' => 'image/jpeg']);
    }
}
