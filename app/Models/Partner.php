<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use SoftDeletes;
    use HasFactory;
    
    protected $appends = ['logo_url'];
    protected $hidden = ['logo'];
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name','logo'
    ];

    public function getLogoUrlAttribute()
    {  
        return url('/').'/'.$this->logo;
    }
}
