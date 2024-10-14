<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = config('resources.sections');
        foreach ($sections as $section) {
            Section::insertOrIgnore([
                'name' => $section,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
