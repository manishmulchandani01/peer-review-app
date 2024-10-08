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
        // DB::table('enrolments')->truncate();

        // DB::table('enrolments')->insert([
        //     's_number' => 's0000001',
        //     'course_id' => '1',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // DB::table('enrolments')->insert([
        //     's_number' => 's0000001',
        //     'course_id' => '2',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // DB::table('enrolments')->insert([
        //     's_number' => 's0000002',
        //     'course_id' => '3',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // DB::table('enrolments')->insert([
        //     's_number' => 's0000002',
        //     'course_id' => '4',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        $enrolments = [
            ['s_number' => 's0000001', 'course_id' => 1],
            ['s_number' => 's0000001', 'course_id' => 2],
            ['s_number' => 's0000001', 'course_id' => 3],
            ['s_number' => 's0000001', 'course_id' => 4],
            ['s_number' => 's0000002', 'course_id' => 1],
            ['s_number' => 's0000002', 'course_id' => 2],
            ['s_number' => 's0000002', 'course_id' => 4],
            ['s_number' => 's0000003', 'course_id' => 1],
            ['s_number' => 's0000004', 'course_id' => 4],
            ['s_number' => 's0000005', 'course_id' => 5],
            ['s_number' => 's0000006', 'course_id' => 1],
            ['s_number' => 's0000007', 'course_id' => 2],
            ['s_number' => 's0000008', 'course_id' => 3],
            ['s_number' => 's0000009', 'course_id' => 4],
            ['s_number' => 's0000010', 'course_id' => 5],
            ['s_number' => 's0000011', 'course_id' => 1],
            ['s_number' => 's0000012', 'course_id' => 2],
            ['s_number' => 's0000013', 'course_id' => 3],
            ['s_number' => 's0000014', 'course_id' => 4],
            ['s_number' => 's0000015', 'course_id' => 5],
            ['s_number' => 's0000016', 'course_id' => 1],
            ['s_number' => 's0000017', 'course_id' => 2],
            ['s_number' => 's0000018', 'course_id' => 3],
            ['s_number' => 's0000019', 'course_id' => 4],
            ['s_number' => 's0000020', 'course_id' => 5],
            ['s_number' => 's0000021', 'course_id' => 1],
            ['s_number' => 's0000022', 'course_id' => 2],
            ['s_number' => 's0000023', 'course_id' => 3],
            ['s_number' => 's0000024', 'course_id' => 4],
            ['s_number' => 's0000025', 'course_id' => 5],
            ['s_number' => 's0000026', 'course_id' => 1],
            ['s_number' => 's0000027', 'course_id' => 2],
            ['s_number' => 's0000028', 'course_id' => 3],
            ['s_number' => 's0000029', 'course_id' => 4],
            ['s_number' => 's0000030', 'course_id' => 5],
            ['s_number' => 's0000031', 'course_id' => 1],
            ['s_number' => 's0000032', 'course_id' => 2],
            ['s_number' => 's0000033', 'course_id' => 1],
            ['s_number' => 's0000034', 'course_id' => 4],
            ['s_number' => 's0000035', 'course_id' => 5],
            ['s_number' => 's0000036', 'course_id' => 1],
            ['s_number' => 's0000037', 'course_id' => 2],
            ['s_number' => 's0000038', 'course_id' => 1],
            ['s_number' => 's0000039', 'course_id' => 4],
            ['s_number' => 's0000040', 'course_id' => 5],
            ['s_number' => 's0000041', 'course_id' => 1],
            ['s_number' => 's0000042', 'course_id' => 2],
            ['s_number' => 's0000043', 'course_id' => 1],
            ['s_number' => 's0000044', 'course_id' => 1],
            ['s_number' => 's0000045', 'course_id' => 5],
            ['s_number' => 's0000046', 'course_id' => 1],
            ['s_number' => 's0000047', 'course_id' => 2],
            ['s_number' => 's0000048', 'course_id' => 3],
            ['s_number' => 's0000049', 'course_id' => 1],
            ['s_number' => 's0000050', 'course_id' => 5],
            ['s_number' => 's0000051', 'course_id' => 1],
            ['s_number' => 's0000052', 'course_id' => 2],
            ['s_number' => 's0000053', 'course_id' => 3],
            ['s_number' => 's0000054', 'course_id' => 1],
            ['s_number' => 's0000055', 'course_id' => 5],
            ['s_number' => 's0000056', 'course_id' => 1],
            ['s_number' => 's0000057', 'course_id' => 3],
            ['s_number' => 's0000058', 'course_id' => 3],
            ['s_number' => 's0000059', 'course_id' => 4],
            ['s_number' => 's0000060', 'course_id' => 5]
        ];

        foreach ($enrolments as $enrolment) {
            DB::table('enrolments')->insert([
                's_number' => $enrolment['s_number'],
                'course_id' => $enrolment['course_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
