<?php

namespace Modules\BlogModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name' , 'email' , 'comment'];
    
}
