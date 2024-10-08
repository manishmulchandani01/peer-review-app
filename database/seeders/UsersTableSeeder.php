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
            'name' => "James",
            'email' => "james@griffithuni.edu.au",
            's_number' => "s0000001",
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);

        DB::table('users')->insert([
            'name' => "Morgan",
            'email' => "morgan@griffithuni.edu.au",
            's_number' => "s0000002",
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);

        DB::table('users')->insert([
            'name' => "Jay",
            'email' => "jay@griffithuni.edu.au",
            's_number' => "s0000003",
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);

        DB::table('users')->insert([
            'name' => "Ryan",
            'email' => "ryan@griffithuni.edu.au",
            's_number' => "s0000004",
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);

        DB::table('users')->insert([
            'name' => "Jeff",
            'email' => "jeff@griffithuni.edu.au",
            's_number' => "s0000005",
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);

        DB::table('users')->insert([
            'name' => "Sam",
            'email' => "sam@griffithuni.edu.au",
            's_number' => "s0000006",
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);

        DB::table('users')->insert([
            'name' => "Mark",
            'email' => "mark@griffithuni.edu.au",
            's_number' => "s0000007",
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);

        DB::table('users')->insert([
            'name' => "Malcom",
            'email' => "malcom@griffithuni.edu.au",
            's_number' => "s0000008",
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);

        DB::table('users')->insert([
            'name' => "David",
            'email' => "david@griffithuni.edu.au",
            's_number' => "s0000009",
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);

        DB::table('users')->insert([
            'name' => "Adam",
            'email' => "adam@griffithuni.edu.au",
            's_number' => "s0000010",
            'password' => Hash::make('password'),
            'role' => 'teacher',
        ]);

        DB::table('users')->insert([
            'name' => "Sophia",
            'email' => "sophia@griffithuni.edu.au",
            's_number' => "s0000011",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Liam",
            'email' => "liam@griffithuni.edu.au",
            's_number' => "s0000012",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Isabella",
            'email' => "isabella@griffithuni.edu.au",
            's_number' => "s0000013",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Noah",
            'email' => "noah@griffithuni.edu.au",
            's_number' => "s0000014",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Mia",
            'email' => "mia@griffithuni.edu.au",
            's_number' => "s0000015",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Oliver",
            'email' => "oliver@griffithuni.edu.au",
            's_number' => "s0000016",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Emma",
            'email' => "emma@griffithuni.edu.au",
            's_number' => "s0000017",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Ethan",
            'email' => "ethan@griffithuni.edu.au",
            's_number' => "s0000018",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Ava",
            'email' => "ava@griffithuni.edu.au",
            's_number' => "s0000019",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Lucas",
            'email' => "lucas@griffithuni.edu.au",
            's_number' => "s0000020",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Amelia",
            'email' => "amelia@griffithuni.edu.au",
            's_number' => "s0000021",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Henry",
            'email' => "henry@griffithuni.edu.au",
            's_number' => "s0000022",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Lily",
            'email' => "lily@griffithuni.edu.au",
            's_number' => "s0000023",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Alexander",
            'email' => "alexander@griffithuni.edu.au",
            's_number' => "s0000024",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Ella",
            'email' => "ella@griffithuni.edu.au",
            's_number' => "s0000025",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Jacob",
            'email' => "jacob@griffithuni.edu.au",
            's_number' => "s0000026",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Grace",
            'email' => "grace@griffithuni.edu.au",
            's_number' => "s0000027",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Benjamin",
            'email' => "benjamin@griffithuni.edu.au",
            's_number' => "s0000028",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Zoe",
            'email' => "zoe@griffithuni.edu.au",
            's_number' => "s0000029",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Logan",
            'email' => "logan@griffithuni.edu.au",
            's_number' => "s0000030",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Chloe",
            'email' => "chloe@griffithuni.edu.au",
            's_number' => "s0000031",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Jackson",
            'email' => "jackson@griffithuni.edu.au",
            's_number' => "s0000032",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Scarlett",
            'email' => "scarlett@griffithuni.edu.au",
            's_number' => "s0000033",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Carter",
            'email' => "carter@griffithuni.edu.au",
            's_number' => "s0000034",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Sophie",
            'email' => "sophie@griffithuni.edu.au",
            's_number' => "s0000035",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Wyatt",
            'email' => "wyatt@griffithuni.edu.au",
            's_number' => "s0000036",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Evelyn",
            'email' => "evelyn@griffithuni.edu.au",
            's_number' => "s0000037",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Sebastian",
            'email' => "sebastian@griffithuni.edu.au",
            's_number' => "s0000038",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Ellie",
            'email' => "ellie@griffithuni.edu.au",
            's_number' => "s0000039",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Matthew",
            'email' => "matthew@griffithuni.edu.au",
            's_number' => "s0000040",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Avery",
            'email' => "avery@griffithuni.edu.au",
            's_number' => "s0000041",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Jack",
            'email' => "jack@griffithuni.edu.au",
            's_number' => "s0000042",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Harper",
            'email' => "harper@griffithuni.edu.au",
            's_number' => "s0000043",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Owen",
            'email' => "owen@griffithuni.edu.au",
            's_number' => "s0000044",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Aria",
            'email' => "aria@griffithuni.edu.au",
            's_number' => "s0000045",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Mason",
            'email' => "mason@griffithuni.edu.au",
            's_number' => "s0000046",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Emily",
            'email' => "emily@griffithuni.edu.au",
            's_number' => "s0000047",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Elijah",
            'email' => "elijah@griffithuni.edu.au",
            's_number' => "s0000048",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Abigail",
            'email' => "abigail@griffithuni.edu.au",
            's_number' => "s0000049",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Aiden",
            'email' => "aiden@griffithuni.edu.au",
            's_number' => "s0000050",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Chloe",
            'email' => "chloe1@griffithuni.edu.au",
            's_number' => "s0000051",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Evelyn",
            'email' => "evelyn1@griffithuni.edu.au",
            's_number' => "s0000052",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Sophie",
            'email' => "sophie1@griffithuni.edu.au",
            's_number' => "s0000053",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Jackson",
            'email' => "jackson1@griffithuni.edu.au",
            's_number' => "s0000054",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Avery",
            'email' => "avery1@griffithuni.edu.au",
            's_number' => "s0000055",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Mason",
            'email' => "mason1@griffithuni.edu.au",
            's_number' => "s0000056",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Grace",
            'email' => "grace1@griffithuni.edu.au",
            's_number' => "s0000057",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Harper",
            'email' => "harper1@griffithuni.edu.au",
            's_number' => "s0000058",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Liam",
            'email' => "liam1@griffithuni.edu.au",
            's_number' => "s0000059",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        DB::table('users')->insert([
            'name' => "Ella",
            'email' => "ella1@griffithuni.edu.au",
            's_number' => "s0000060",
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);
    }
}
