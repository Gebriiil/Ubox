<?php

namespace Modules\ProjectModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use  Modules\ProjectModule\Entities\Project_Category;
use  Modules\ProjectModule\Entities\Project_CategoryTranslation;
use Modules\ProjectModule\Repository\Project_CategoryRepository;
use App\DataTables\Project_CategoryDataTable;
class CategoryController extends Controller
{
    private  $projectCategoryRepo;

    public function __construct(Project_CategoryRepository $project_categoryRepository)
    {
        $this->projectCategoryRepo=$project_categoryRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Project_CategoryDataTable $project_categoryDataTable)
    {
        $projects = $this->projectCategoryRepo->findAll();
        return view('projectmodule::categories.index');
        //return $project_categoryDataTable->render('projectmodule::categories.index');
    }
    public function my_index()
    {

        $projects=$this->projectCategoryRepo->findAll();
        return view('projectmodule::categories.index',compact('projects'));
        //return $project_categoryDataTable->render('projectmodule::categories.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('projectmodule::categories.create');
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
        $data=$request->all();
        $this->projectCategoryRepo->save($data);
        session()->flash('success' , __('projectmodule::project.success'));
        return redirect(route('project.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('projectmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $category=$this->projectCategoryRepo->findById($id);
        return view('projectmodule::categories.edit' ,compact('category'));
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
        $data=$request->all();
        $this->projectCategoryRepo->update($data,$id);
        session()->flash('success' , __('projectmodule::project.success'));
        return redirect(route('project.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->projectCategoryRepo->delete($id);
        return back();
    }
}
