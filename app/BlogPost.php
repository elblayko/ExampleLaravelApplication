<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    public $table = 'blog_posts';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $author_id;
    protected $title;
    protected $body;
}
