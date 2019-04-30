<?php

namespace Modules\BlogModule\Entities;

use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    protected $fillable = ['title','desc'];
    public $timestamps = false; 
    protected $table = 'blog_translations'; 
}
