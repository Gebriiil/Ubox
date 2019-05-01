<?php

namespace Modules\TrainingModule\Repository;

use Modules\TrainingModule\Entities\TrainingCategory;
use File;

class TrainingCategoryRepository{

    function findAll()
    {
        $training_category = TrainingCategory::all();
        return $training_category;
    }


    function save($training_category)
    {
        $training_category = TrainingCategory::create($training_category);
        return $training_category;
    }

    function findById($id)
    {
        $training_category = TrainingCategory::find($id);
        return $training_category;
    }

    function findBy($key,$value){
        $training_category = TrainingCategory::where($key,$value)->get();
        return $training_category;
    }



    function update($trainingData,$id)
    {
        $training_category = TrainingCategory::find($id);
        $training_category = $training_category->update($trainingData);
        return $training_category;
    }

    function delete($id){
        $training_category = TrainingCategory::find($id);

        File::delete( asset('uploads' , $training_category->image) );

        $training_category->delete();
        return 'success';
    }

}