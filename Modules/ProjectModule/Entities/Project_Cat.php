<?php

namespace Modules\ProjectModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Modules\TrainingModule\Entities\Training;
use Modules\ProjectModule\Entities\Project;
class Project_Cat extends Model
{
	use Translatable;
	protected $table='project__cat';
    protected $guarded = [];
    public $translatedAttributes=['name','desc'];

    public  function projects()
    {
    	return $this->hasMany(Project::class);
    }
}
