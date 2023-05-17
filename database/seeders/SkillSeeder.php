<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::create(['title' => 'Back-end', 'rate' => '80']);
        Skill::create(['title' => 'Front-end', 'rate' => '60']);
        Skill::create(['title' => 'Laravel', 'rate' => '70']);
        Skill::create(['title' => 'React', 'rate' => '50']);
    }
}
