<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BlogPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\BlogPost::insert([
            'author_id' => 1,
            'title' => 'My First Post',
            'body' => 'This is my first blog post',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        \App\BlogPost::insert([
            'author_id' => 1,
            'title' => 'My Second Post',
            'body' => 'This is my second blog post',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        \App\BlogPost::insert([
            'author_id' => 1,
            'title' => 'My Third Post',
            'body' => 'This is my third blog post',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}