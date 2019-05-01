<?php

namespace Modules\ProjectModule\Repository;

use Modules\ProjectModule\Entities\Project_Category;

class Project_CategoryRepository{

    function findAll()
    {
        $project_category = Project_Category::all();
        return $project_category;
    }


    function save($project_category)
    {
        $project_category = Project_Category::create($project_category);
        return $project_category;
    }

    function findById($id)
    {
        $project_category = Project_Category::find($id);
        return $project_category;
    }

    function findBy($key,$value){
        $project_category = Project_Category::where($key,$value)->get();
        return $project_category;
    }



    function update($ProjectData,$id)
    {
        $project_category = Project_Category::find($id);
        $project_category = $project_category->update($ProjectData);
        return $project_category;
    }

    function delete($id){
        $project_category = Project_Category::find($id);
        $project_category->destroy();
        
    }

}