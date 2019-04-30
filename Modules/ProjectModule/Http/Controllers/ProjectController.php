<?php

namespace Modules\ProjectModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use  Modules\ProjectModule\Entities\Project;
use  Modules\ProjectModule\Entities\ProjectTranslation;
use  Modules\ProjectModule\Entities\Project_Category;
use  Modules\ProjectModule\Entities\Project_CategoryTranslation;
use  Modules\ProjectModule\Repository\ProjectRepository;
use Modules\ProjectModule\Repository\Project_CategoryRepository;
use App\DataTables\ProjectDatatable;
class ProjectController extends Controller
{
    private $projectRepo;
    private $projectCategoryRepo;
    public function __construct(
        ProjectRepository $projectrepository,
        Project_CategoryRepository $project_categoryRepository
    )
    {
        $this->projectRepo=$projectrepository;
        $this->projectCategoryRepo=$project_categoryRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $projects=$this->projectRepo->findAll();
        return view('projectmodule::projects.create' , compact('projects'));
    }

    // public function dataTales()
    // {
    //     $projects=Project::all();
    //     return DataTables::of($projects)
    //         ->addColumn('name', function($row) {
    //             return  $row->name;
    //         })
    //         ->addColumn('edit', function($row) {
    //             return '<a href="'. url("admin-panel/product/" . $row->id . "/edit") .'" type="button" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
    //         })
    //         ->addColumn('delete', function ($row) {
    //             return '<a href="'. url('admin-panel/delete', $row->id) .'" class="btn btn btn-danger" data-confirm="Are you sure, You want to delete?" data-method="delete"><i class="glyphicon glyphicon-trash"></i></a>';
    //         })
    //         ->rawColumns(['delete' => 'delete','edit' => 'edit'])

    //         ->make(true);
    // }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories=$this->projectCategoryRepo->findAll();
        return view('projectmodule::projects.create' , compact('categories'));
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
        $rules+=['image'=>'required|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG'];
        $request->validate($rules);
        $image_name= image_name($request->image);
        $data=$request->except(['image']);
        $data['image']=$image_name;

        $this->projectRepo->save($data);
        
        image_upload($request->image , $image_name);
        session()->flash('success' , __('projectmodule::project.success'));
        return redirect(route('project.index'));
    }

    public function show($id)
    {
        //return view('projectmodule::show');
    }

    public function edit($id)
    {      
        $project=$this->projectRepo->findById($id);
        return view('projectmodule::projects.edit', compact('project'));
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
        $rules+=['image'=>'required|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG'];
        $request->validate($rules);
        $image_name= image_name($request->image);
        $data=$request->except(['image']);
        $data['image']=$image_name;

        $project=$this->projectRepo->findById($id);
        $this->projectRepo->update($data,$id);
        image_upload($request->image , $image_name);
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
        $this->projectRepo->delete($id);
        return back();
    }
}
