<?php

namespace Modules\ProjectModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Modules\ProjectModule\Entities\Project_Cat;
class Project extends Model
{
	use Translatable;
	protected $table='projects';
    protected $fillable = ['image'];
    protected $translatedAttributes=['name','desc'];

    public function project_category()
    {
    	$this->belongsTo(Project_Cat::class);
    }

    public function image_path(){
        return asset('public/upload/' . $this->image);
    }
}
