<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            'code' => '7005ICT',
            'name' => "Programming Principles 2",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('courses')->insert([
            'code' => '7812ICT',
            'name' => "Agile Business Analysis",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('courses')->insert([
            'code' => '7130ICT',
            'name' => "Data Analytics",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('courses')->insert([
            'code' => '7301ICT',
            'name' => "Enterprise Architecture Concepts",
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('courses')->insert([
            'code' => '7421ICT',
            'name' => "Mobile Application Development",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
