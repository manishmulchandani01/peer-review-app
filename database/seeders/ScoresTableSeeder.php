<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('scores')->insert([
            'assessment_id' => '1',
            'student_id' => '4',
            'score' => '100',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
