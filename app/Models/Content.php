<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
    protected $appends = ['image_url'];
    protected $hidden = ['image'];
    protected $fillable = [
        'page_name',
        'type',
        'description_en',
        'description_ar',
        'image'
    ];
    public function getImageUrlAttribute()
    {  
        return url('/').'/'.$this->image;
    }

}
