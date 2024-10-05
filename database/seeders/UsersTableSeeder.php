<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "Adam",
            'email' => "adam@griffithuni.edu.au",
            's_number' => "s0000001",
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);

        DB::table('users')->insert([
            'name' => "Sam",
            'email' => "sam@griffithuni.edu.au",
            's_number' => "s0000002",
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);

        DB::table('users')->insert([
            'name' => "Mark",
            'email' => "mark@griffithuni.edu.au",
            's_number' => "s0000003",
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);

        DB::table('users')->insert([
            'name' => "Malcom",
            'email' => "malcom@griffithuni.edu.au",
            's_number' => "s0000004",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Manish",
            'email' => "manish@griffithuni.edu.au",
            's_number' => "s0000005",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Gregory",
            'email' => "gregory@griffithuni.edu.au",
            's_number' => "s0000006",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);
    }
}
