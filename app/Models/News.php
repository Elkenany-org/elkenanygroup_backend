<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class News extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $appends = ['image_url'];
    protected $hidden = ['image'];
    protected $dates = ['deleted_at'];
    protected $fillable = ['language','title','image','category_id','description','shortdescription','alt_text','focus_keyword'
                        ,'social_title','social_link','social_image','social_description','social_alt_text'
                        ,'meta_title','meta_link','meta_description'];
  
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    
    public function getImageUrlAttribute()
    {  
        return url('/').'/'.$this->image;
    }
}
