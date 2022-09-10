<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactFrom extends Model
{
    use HasFactory;
    protected $fillable =[
        'contact_name',
        'contact_email',
        'contact_number',
        'contact_message',
    ];
}
