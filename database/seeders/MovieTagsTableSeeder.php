<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
                    ['movie_id' => 1, 'tag_id' => 1],
                    ['movie_id' => 1, 'tag_id' => 4],
                    ['movie_id' => 2, 'tag_id' => 4],
                    ['movie_id' => 2, 'tag_id' => 5],
                    ['movie_id' => 3, 'tag_id' => 3],
                ];

        foreach ($tags as $tag) {
            DB::table('movie_tags')->insert($tag);
        }
    }
}
