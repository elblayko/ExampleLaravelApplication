<?php

use Illuminate\Database\Seeder;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_posts')->insert([
            'author_id' => 1,
            'title' => Str::random(10),
            'body' => Str::random(25)   
        ]);
    }
}