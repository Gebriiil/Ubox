<?php

namespace Modules\JobModule\Repository;

use Modules\JobModule\Entities\JobCategory;
use File;

class JobCategoryRepository{

    function findAll()
    {
        $Job_category = JobCategory::all();
        return $Job_category;
    }


    function save($Job_category)
    {

        $category = JobCategory::create($Job_category);

        return $category;
    }

    function findById($id)
    {
        $Job_category = JobCategory::find($id);
        return $Job_category;
    }

    function findBy($key,$value){
        $Job_category = JobCategory::where($key,$value)->get();
        return $Job_category;
    }



    function update($JobData,$id)
    {
        $Job_category = JobCategory::find($id);
        $Job_category = $Job_category->update($JobData);
        return $Job_category;
    }

    function delete($id){
        $Job_category = JobCategory::find($id);

        File::delete( asset('uploads' , $Job_category->image) );

        $Job_category->delete();
        return 'success';
    }

}