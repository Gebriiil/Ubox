<?php

namespace Modules\ProjectModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Modules\ProjectModule\Entities\Project_Category;
class Project extends Model
{
	use Translatable;
	protected $table='projects';
    protected $fillable = ['image'];
    protected $translatedAttributes=['name','desc'];

    public function project_category()
    {
    	$this->belongsTo(Project_Category::class);
    }
}
