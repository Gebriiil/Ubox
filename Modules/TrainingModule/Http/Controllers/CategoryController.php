<?php

namespace Modules\TrainingModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use  Modules\TrainingModule\Entities\TrainingCategory;
use  Modules\TrainingModule\Entities\TrainingCategoryTranslation;
use Modules\TrainingModule\Repository\TrainingCategoryRepository;
use App\DataTables\TrainingCategoryDataTable;
class CategoryController extends Controller
{
    private  $trainingCategoryRepo;

    public function __construct(TrainingCategoryRepository $training_categoryRepository)
    {
        $this->trainingCategoryRepo=$training_categoryRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function taining_category_index()
    {

        $categories = $this->trainingCategoryRepo->findAll();
        $title = 'Training';

        return view('trainingmodule::categories.index' , compact('categories' , 'title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('trainingmodule::categories.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules=[];
        foreach(config('translatable.locales') as $locale){
            $rules+=[$locale . '.*'=>'required'];
        }
        $request->validate($rules);

        $image_name= image_name($request->image);
        $data=$request->except(['image']);

        $data['image']=$image_name;

        image_upload($request->image , $image_name);


        $this->trainingCategoryRepo->save($data);
        session()->flash('success' , __('trainingmodule::training.success'));
        return redirect(route('training_category_index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('trainingmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $category=$this->trainingCategoryRepo->findById($id);
        return view('trainingmodule::categories.edit' ,compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $rules=[];
        foreach(config('translatable.locales') as $locale){
            $rules+=[$locale . '.*'=>'required'];
        }
        $request->validate($rules);


        $image_name= image_name($request->image);
        $data=$request->except(['image']);

        $data['image']=$image_name;

        image_upload($request->image , $image_name);

        $this->trainingCategoryRepo->update($data,$id);
        session()->flash('success' , __('trainingmodule::training.success'));
        return redirect(route('training_category_index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->trainingCategoryRepo->delete($id);

        return back();
    }
}
