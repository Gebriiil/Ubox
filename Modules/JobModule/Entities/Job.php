<?php

namespace Modules\JobModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class Job extends Model
{
    use Translatable;

    protected $translatedAttributes = ['title' , 'description' , 'meta_title' , 'meta_desc' , 'meta_keywords' , 'slug'];
    protected $append = ['job_skills'];

    protected $guarded = [];

    function skills(){
        return $this->hasMany(Skill::class , 'job_id' , 'id');
    }

    
    public function job_skills(){
        $skills = $this->skills;
        $jobSkills = '';

        foreach ($skills as $skill) {
            $jobSkills .= $skill->name . ', '; 
        }
        
        return rtrim($jobSkills , ', ');

    }

    public function getAttributeType($value)
    {
        $new = '';

        if($value == 'fulltime'){
            $new = 'Full Time';
        }

        if($value == 'parttime'){
            $new = 'Part Time';
        }

        if($value == 'intern'){
            $new = 'Intern';
        }

        if($value == 'recent'){
            $new = 'Recent';
        }
        
        return ucfirst($new);

    }


}
