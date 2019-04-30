<?php

namespace Modules\TrainingModule\Repository;

use Modules\TrainingModule\Entities\Training;

class TrainingRepository{

    function findAll()
    {
        $project = Training::all();
        return $project;
    }


    function save($project)
    {
        $project = Training::create($project);
        return $project;
    }

    function findById($id)
    {
        $project = Training::find($id);
        return $project;
    }

    function findBy($key,$value){
        $project = Training::where($key,$value)->get();
        return $project;
    }



    function update($ProjectData,$id)
    {
        $Project = Training::find($id);
        $Project = $Project->update($ProjectData);
        return $Project;
    }

    function delete($id){
        $project = Training::find($id);
        $project->destroy();
        return 'success';
    }

}