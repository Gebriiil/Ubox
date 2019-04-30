<?php

namespace Modules\TrainingModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Modules\ProjectModule\Entities\Project_Category;
class Training extends Model
{
	use Translatable;
	protected $table='training';
    protected $fillable = ['image'];
    protected $translatedAttributes=['name','desc'];

    public function project_category()
    {
    	$this->belongsTo(Project_Category::class);
    }
}
