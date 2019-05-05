<?php

namespace Modules\TrainingModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Modules\ProjectModule\Entities\Project_Cat;
class Training extends Model
{
	use Translatable;
	protected $table='training';
    protected $guarded = [];
    protected $translatedAttributes=['name','desc'];

    public function project_category()
    {
    	$this->belongsTo(Project_Cat::class);
    }
}
