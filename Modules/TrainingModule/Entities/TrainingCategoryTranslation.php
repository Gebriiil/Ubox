<?php

namespace Modules\TrainingModule\Entities;

use Illuminate\Database\Eloquent\Model;

class TrainingCategoryTranslation extends Model
{
    protected $fillable = ['name','desc'];
    public $timestamps = false;
    protected $table = 'training_cat_translations';
}
