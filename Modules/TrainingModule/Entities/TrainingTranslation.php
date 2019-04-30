<?php

namespace Modules\TrainingModule\Entities;

use Illuminate\Database\Eloquent\Model;

class TrainingTranslation extends Model
{
    protected $fillable = ['name','desc'];
    public $timestamps = false;
    protected $table = 'training_translations';
}
