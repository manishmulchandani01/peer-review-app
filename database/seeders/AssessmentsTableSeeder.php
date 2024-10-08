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
            'instruction' => 'As the title suggests review each other ;)',
            'reviews' => 1,
            'max_score' => 100,
            'due_date' => Carbon::create(2024, 10, 20, 23, 59, 00),
            'type' => 'student-select',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('assessments')->insert([
            'course_id' => 1,
            'title' => 'Week 2 Peer Review',
            'instruction' => 'Peer review for week 2, score number is 50 now',
            'reviews' => 1,
            'max_score' => 50,
            'due_date' => Carbon::create(2024, 10, 20, 23, 59, 00),
            'type' => 'student-select',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('assessments')->insert([
            'course_id' => 1,
            'title' => 'Week 3 Peer Review',
            'instruction' => 'Week 3 peer review, score is 50 and max reviews are 2 now',
            'reviews' => 1,
            'max_score' => 50,
            'due_date' => Carbon::create(2024, 10, 20, 23, 59, 00),
            'type' => 'student-select',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('assessments')->insert([
            'course_id' => 2,
            'title' => 'Week 1 Peer Review',
            'instruction' => 'Score is 100 and max reviews are 3',
            'reviews' => 3,
            'max_score' => 100,
            'due_date' => Carbon::create(2024, 10, 20, 23, 59, 00),
            'type' => 'student-select',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('assessments')->insert([
            'course_id' => 3,
            'title' => 'Week 1 Peer Review',
            'instruction' => 'As the title suggests review each other ;)',
            'reviews' => 1,
            'max_score' => 49,
            'due_date' => Carbon::create(2024, 10, 20, 23, 59, 00),
            'type' => 'student-select',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('assessments')->insert([
            'course_id' => 4,
            'title' => 'Week 1 Peer Review',
            'instruction' => 'Review for week 1',
            'reviews' => 1,
            'max_score' => 99,
            'due_date' => Carbon::create(2024, 10, 20, 23, 59, 00),
            'type' => 'student-select',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('assessments')->insert([
            'course_id' => 4,
            'title' => 'Week 2 Peer Review',
            'instruction' => 'Review each other',
            'reviews' => 1,
            'max_score' => 100,
            'due_date' => Carbon::create(2024, 10, 20, 23, 59, 00),
            'type' => 'student-select',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('assessments')->insert([
            'course_id' => 5,
            'title' => 'Week 1 Peer Review',
            'instruction' => 'Review all',
            'reviews' => 5,
            'max_score' => 100,
            'due_date' => Carbon::create(2024, 10, 20, 23, 59, 00),
            'type' => 'student-select',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
