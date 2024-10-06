<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EnrolmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('enrolments')->truncate();

        DB::table('enrolments')->insert([
            'user_id' => '1',
            'course_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            'user_id' => '1',
            'course_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            'user_id' => '2',
            'course_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            'user_id' => '2',
            'course_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            'user_id' => '2',
            'course_id' => '5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            'user_id' => '4',
            'course_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            'user_id' => '5',
            'course_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            'user_id' => '6',
            'course_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            'user_id' => '7',
            'course_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            'user_id' => '6',
            'course_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            'user_id' => '7',
            'course_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
