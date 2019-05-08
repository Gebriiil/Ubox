<?php

namespace Modules\TrainingModule\Repository;

use Modules\TrainingModule\Entities\Training;
use File;

class TrainingRepository{

    function findAll()
    {
        return Training::all();
    }

    function findAllByPagination()
    {
        return Training::where(function($query){

            return $query->when( request('training_cat_id') , function($query){
                if( request('training_cat_id') > 0 ){

                    return $query->where('training_cat_id' , request('category_id'));
                }
                return null;
            });

        })->paginate(5);
    }


    function save($trainig)
    {
        $trainig = Training::create($trainig);
        return $trainig;
    }

    function findById($id)
    {
        $trainig = Training::find($id);
        return $trainig;
    }

    function findBy($key,$value){
        $trainig = Training::where($key,$value)->get();
        return $trainig;
    }



    function update($trainigData,$id)
    {
        $trainig = Training::find($id);
        $trainig = $trainig->update($trainigData);
        return $trainig;
    }

    function delete($id){
        $trainig = Training::find($id);

        File::delete( asset('upload' , $trainig->image) );

        $trainig->delete();
        return 'success';
    }

}