<?php

namespace Modules\ProjectModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Modules\TrainingModule\Entities\Training;
class Project_Category extends Model
{
	use Translatable;
	protected $table='project__categories';
    protected $guarded = [];
    public $translatedAttributes=['name','desc'];

    public function projects()
    {
    	$this->hasMany(Training::class);
    }
}
