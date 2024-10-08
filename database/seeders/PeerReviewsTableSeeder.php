<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeerReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peer_reviews')->insert([
            'assessment_id' => 1,
            'reviewer_id' => 11,
            'reviewee_id' => 16,
            'text' => 'Keep the good work',
            'rating' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('peer_reviews')->insert([
            'assessment_id' => 1,
            'reviewer_id' => 16,
            'reviewee_id' => 11,
            'text' => 'Keep the good work too',
            'rating' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('peer_reviews')->insert([
            'assessment_id' => 1,
            'reviewer_id' => 26,
            'reviewee_id' => 11,
            'text' => 'Perfect work, I like it',
            'rating' => 5,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('peer_reviews')->insert([
            'assessment_id' => 4,
            'reviewer_id' => 22,
            'reviewee_id' => 17,
            'text' => 'As per the requirements',
            'rating' => 4,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('peer_reviews')->insert([
            'assessment_id' => 4,
            'reviewer_id' => 17,
            'reviewee_id' => 47,
            'text' => 'You should improve',
            'rating' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('peer_reviews')->insert([
            'assessment_id' => 8,
            'reviewer_id' => 13,
            'reviewee_id' => 18,
            'text' => 'Needs improvement by margin',
            'rating' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
