<?php

namespace Modules\TrainingModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\TrainingModule\Entities\Training;
use Modules\TrainingModule\Entities\TrainingTranslation;
use Modules\TrainingModule\Entities\TrainingCategory;
use Modules\TrainingModule\Entities\TrainingCategoryTranslation;
use Modules\TrainingModule\Repository\TrainingRepository;
use Modules\TrainingModule\Repository\TrainingCategoryRepository;
use App\DataTables\TrainingDatatable;
class TrainingController extends Controller
{

  private $trainingRepo;
  private $trainingCategoryRepo;

  public function __construct(
      TrainingRepository $trainingrepository,
        TrainingCategoryRepository $training_categoryRepository)
    {       $this->trainingRepo=$trainingrepository;
        $this->trainingCategoryRepo=$training_categoryRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function taining_index(TrainingDatatable $trainingDataTable)
    {
        $training= $this->trainingRepo->findAll();
        $title = 'Training';

        return $trainingDataTable->render('trainingmodule::training.index' , compact('training' , 'title'));
    }

    public function dataTales()
    {
         $training=Training::all();
         return DataTables::of($training)
             ->addColumn('name', function($row) {
                 return  $row->name;
             })
             ->addColumn('edit', function($row) {
                 return '<a href="'. url("admin-panel/product/" . $row->id . "/edit") .'" type="button" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
             })
             ->addColumn('delete', function ($row) {
                 return '<a href="'. url('admin-panel/delete', $row->id) .'" class="btn btn btn-danger" data-confirm="Are you sure, You want to delete?" data-method="delete"><i class="glyphicon glyphicon-trash"></i></a>';
             })
             ->rawColumns(['delete' => 'delete','edit' => 'edit'])

             ->make(true);
     }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categories=$this->trainingCategoryRepo->findAll();
        return view('trainingmodule::training.create' , compact('categories'));
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

        $this->trainingRepo->save($data);

        image_upload($request->image , $image_name);
        session()->flash('success' , __('trainingmodule::training.success'));
        return redirect(route('training.index'));
    }

    public function show($id)
    {
        //return view('trainingmodule::show');
    }

    public function edit($id)
    {
        $training=$this->trainingRepo->findById($id);
        return view('trainingmodule::training.edit', compact('training'));
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

        $training=$this->trainingRepo->findById($id);
        $this->trainingRepo->update($data,$id);
        image_upload($request->image , $image_name);
        session()->flash('success' , __('trainingmodule::training.success'));
        return redirect(route('training.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->trainingRepo->delete($id);
        return back();
    }
}
