<?php

namespace Database\Seeders;

use App\Models\FileType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FileTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FileType::create(['title' => 'resume', 'slug' => 'cv']);
        FileType::create(['title' => 'avatar', 'slug' => 'avatar']);
        FileType::create(['title' => 'blog picture', 'slug' => 'blog_pic']);
        FileType::create(['title' => 'project picture', 'slug' => 'proj_pic']);

    }
}
