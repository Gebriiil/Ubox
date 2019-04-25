<?php

namespace Modules\ProjectModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
class Project_Category extends Model
{
	use Translatable;
	protected $table='project__categories';
    protected $fillable = [];
    public $translatedAttributes=['name','desc'];
}
