<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_image',
        'post_category',
        'post_title',
        'post_long_description',
        'post_tags',
    ];
}
