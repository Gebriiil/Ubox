<?php

namespace Modules\TrainingModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Modules\TrainingModule\Entities\Training;
class TrainingCategory extends Model
{
	use Translatable;
	protected $table='training_cat';
    protected $guarded = [];
    public $translatedAttributes=['name','desc'];

    public function projects()
    {
    	return $this->hasMany(Training::class);
    }
}
