<?php

namespace Modules\ProjectModule\Entities;

use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model
{
    protected $fillable = ['name','desc'];
    public $timestamps = false;
    protected $table = 'project_translations';
}
