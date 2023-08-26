<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newcomer extends Model
{
    use HasFactory;
    protected $hidden = ['cv'];
    protected $appends = ['cv_url'];
    protected $fillable = [
        'firstname',
        'secondname',
        'phone',
        'email',
        'cv'
    ];
    public function getCvUrlAttribute()
    {
        return url('/').'/'.$this->cv;
    }
}
