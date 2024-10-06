<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AssessmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('assessments')->insert([
            'course_id' => 1,
            'title' => 'Week 1 Peer Review',
            'instruction' => 'As the title suggests, review each other ;)',
            'reviews' => 1,
            'max_score' => 100,
            'due_date' => Carbon::create(2024, 10, 20, 23, 59, 00),
            'type' => 'student-select',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
