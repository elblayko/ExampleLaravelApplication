<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'body', 'author_id'];

    /**
     * The the relationship to other models.
     *
     * @var array
     */
    public function author() {
        return $this->belongsTo('App\User');
    }
}
