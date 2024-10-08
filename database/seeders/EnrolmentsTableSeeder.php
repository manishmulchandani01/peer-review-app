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
            's_number' => 's0000001',
            'course_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            's_number' => 's0000001',
            'course_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            's_number' => 's0000002',
            'course_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            's_number' => 's0000002',
            'course_id' => '4',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            's_number' => 's0000002',
            'course_id' => '5',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            's_number' => 's0000004',
            'course_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            's_number' => 's0000004',
            'course_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            's_number' => 's0000005',
            'course_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            's_number' => 's0000005',
            'course_id' => '2',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            's_number' => 's0000005',
            'course_id' => '3',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('enrolments')->insert([
            's_number' => 's0000006',
            'course_id' => '1',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
