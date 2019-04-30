<?php

namespace Modules\ProjectModule\Repository;

use Modules\ProjectModule\Entities\Project;

class ProjectRepository{

    function findAll()
    {
        $project = Project::all();
        return $project;
    }


    function save($project)
    {
        $project = Project::create($project);
        return $project;
    }

    function findById($id)
    {
        $project = Project::find($id);
        return $project;
    }

    function findBy($key,$value){
        $project = Project::where($key,$value)->get();
        return $project;
    }



    function update($ProjectData,$id)
    {
        $Project = Project::find($id);
        $Project = $Project->update($ProjectData);
        return $Project;
    }

    function delete($id){
        $project = Project::find($id);
        $project->destroy();
        return 'success';
    }

}