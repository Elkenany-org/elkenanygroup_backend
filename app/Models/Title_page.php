<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title_page extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_name',
        'description',
        'image'
    ];
}
