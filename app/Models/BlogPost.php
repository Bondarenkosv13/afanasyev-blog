<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'user_id',
        'slug',
        'title',
        'excerpt',
        'content_raw',
        'is_published',
    ];
}
