<?php

namespace Database\Seeders;

use App\Models\Link;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Link::create([
            'link' => 'https://twitter.com/Sergey_Svist',
            'title' => 'Twitter',
        ]);

        Link::create([
            'link' => 'https://www.linkedin.com/in/sergeysvist-3a21b4232/',
            'title' => 'LinkedIn',
        ]);

        Link::create([
            'link' => 'https://t.me/SergeySvist',
            'title' => 'Telegram',
        ]);
    }
}
