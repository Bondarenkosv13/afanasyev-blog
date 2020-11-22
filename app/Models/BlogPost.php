<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogPost
 * @package App\Models
 *
 * @property BlogCategory   $category
 * @property User           $user
 * @property string         $title
 * @property string         $slug
 * @property string         $content_raw
 * @property string         $content_html
 * @property string         $excerpt
 * @property boolean        $is_published
 * @property string         $published_at
 */
class BlogPost extends Model
{
    use SoftDeletes;

    const UNKNOWN_USER = 1;

    protected $fillable = [
        'category_id',
        'user_id',
        'slug',
        'title',
        'excerpt',
        'content_raw',
        'is_published',
        'published_at',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function user()
    {
        return$this->belongsTo(User::class);
    }
}
