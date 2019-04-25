<?php

namespace Modules\ProjectModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Modules\ProjectModule\Entities\Project;
class Project_Category extends Model
{
	use Translatable;
	protected $table='project__categories';
    protected $fillable = [];
    public $translatedAttributes=['name','desc'];

    public function projects()
    {
    	$this->hasMany(Project::class);
    }
}
