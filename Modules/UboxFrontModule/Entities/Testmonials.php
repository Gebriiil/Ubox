<?php

namespace Modules\UboxFrontModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Testmonials extends Model {
	protected $fillable = ['name', 'job_title', 'quote', 'photo'];
}
