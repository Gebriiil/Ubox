<?php

namespace Modules\BlogModule\Entities;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	use Translatable;
	protected $table='blogs';
    protected $fillable = ['image1','image2','image3'];
    public $translatedAttributes=['title' , 'desc'];
    public $translationModel = BlogTranslation::class;

    public function comments(){
        return $this->hasMany(Comment::class);
    }

}
