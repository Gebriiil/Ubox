<?php

namespace Modules\UboxFrontModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
	protected $table='newsletters';
    protected $fillable = ['email'];
}
