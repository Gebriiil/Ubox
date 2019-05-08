<?php

namespace Modules\JobModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use  Modules\JobModule\Entities\JobCategory;
use  Modules\JobModule\Entities\JobCategoryTranslation;
use Modules\JobModule\Repository\JobCategoryRepository;
use App\DataTables\JobCategoryDataTable;
class CategoryController extends Controller
{
    private  $JobCategoryRepo;

    public function __construct(JobCategoryRepository $Job_categoryRepository)
    {
        $this->JobCategoryRepo=$Job_categoryRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function job_category_index()
    {

        $categories = $this->JobCategoryRepo->findAll();
        $title = 'Job';

        return view('jobmodule::categories.index' , compact('categories' , 'title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('jobmodule::categories.create');
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


        $this->JobCategoryRepo->save($data);
        session()->flash('success' , __('jobmodule::Job.success'));
        return redirect(route('job_category_index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('jobmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $category=$this->JobCategoryRepo->findById($id);
        return view('jobmodule::categories.edit' ,compact('category'));
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

        $this->JobCategoryRepo->update($data,$id);
        session()->flash('success' , __('jobmodule::Job.success'));
        return redirect(route('job_category_index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->JobCategoryRepo->delete($id);

        return back();
    }
}
