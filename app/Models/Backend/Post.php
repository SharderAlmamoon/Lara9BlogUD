<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_category',
        'post_author',
        'post_title',
        'post_long_description',
        'post_image',
        'post_tags',
        'post_status',
    ];
    public function authorName(){
        return $this->belongsTo(PostAuthor::class,'post_author');
    }
    public function categoryName(){
        return $this->belongsTo(PostCategory::class,'post_category');
    }
}
