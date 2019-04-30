<?php

namespace Modules\ProjectModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Project_CategoryTranslation extends Model
{
    protected $fillable = ['name','desc'];
    public $timestamps = false;
    protected $table = 'project__category_translations';
}
