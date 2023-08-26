<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $appends = ['image_url'];
    protected $hidden = ['image'];
    
    protected $fillable = [
        'name',
        'position',
        'image'
    ];
    
    public function getImageUrlAttribute()
    {  
        return url('/').'/'.$this->image;
    }
}
