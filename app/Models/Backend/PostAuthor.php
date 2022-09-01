<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostAuthor extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_author_name',
        'post_author_status',
    ];
}
