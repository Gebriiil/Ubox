<?php

namespace Modules\JobModule\Entities;

use Illuminate\Database\Eloquent\Model;

class JobCategoryTranslation extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    protected $table = 'job_categories_translations';
}
