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
        return Training::paginate(5);
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

        File::delete( asset('uploads' , $trainig->image) );

        $trainig->delete();
        return 'success';
    }

}