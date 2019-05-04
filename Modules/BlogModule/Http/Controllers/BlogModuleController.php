<?php

namespace Modules\BlogModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\BlogModule\Repository\BlogRepositry;
// use App\DataTables\BlogDatatable;
use Yajra\DataTables\DataTables;
class BlogModuleController extends Controller
{
    private $blogRepo;
    public function __construct(BlogRepositry $blogrepositry)
    {
        $this->blogRepo=$blogrepositry;
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $blogs = $this->blogRepo->findAll();
        return view('blogmodule::blog.index', ['blogs' => $blogs]);
        //return $blogdatatable->render('blogmodule::blog.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    // public function  datatables()
    // {
    //     $blogs=$this->blogRepo->findAll();
        
    //     return DataTables::of($blogs)
    //     ->addColumn('id' , function($row){
    //         return $row->id;
    //     })
    //     ->addColumn('title' , function($row){
    //         return $row->title;
    //     })
    //     ->addColumn('dsec' , function($row){
    //         return $row->desc;
    //     })
    //     ->addColumn('edit', function($row) {
    //             return '<a href="'. url("admin-panel/blog/" . $row->id . "/edit") .'" type="button" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a>';
    //     })
    //     ->addColumn('delete', function ($row) {
    //             return '<a href="'. url('admin-panel/blog', $row->id) .'" class="btn btn btn-danger" data-confirm="Are you sure, You want to delete?" data-method="delete"><i class="glyphicon glyphicon-trash"></i></a>';
    //     })
    //     ->rawColumns(['delete' => 'delete','edit' => 'edit'])

    //     ->make(true);
    // }
    public function create()
    {
        return view('blogmodule::blog.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules=[];
        $data=[];
        $i=0;
        foreach(config('translatable.locales') as $locale){
            $rules+=[$locale . '.*'=>'required'];
        }

        $rules+=['photos.*'=>'required|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG'];
        $request->validate($rules);
        $photos=$request->photos;
        $data=$request->except(['photos']);
        foreach($photos as $photo){
            $i++;
            $photo_name = image_name($photo);
            
            
            $data['image' . $i ] = $photo_name;

            image_upload($photo , $photo_name) ;
        }

        $this->blogRepo->save($data);
        return redirect(aurl('blog'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //return view('blogmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $blog=$this->blogRepo->findById($id);
        return view('blogmodule::blog.edit' , compact('blog'));
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
        $data=[];
        $i=0;
        foreach(config('translatable.locales') as $locale){
            $rules+=[$locale . '.*'=>'required'];
        }

        $rules+=['photos.*'=>'required|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG'];
        $request->validate($rules);
        $photos=$request->photos;
        $data=$request->except(['photos']);
        foreach($photos as $photo){
            $i++;
            $data['image' . $i ]= image_name($photo);
            image_upload($photo , image_name($photo));
        }
        $this->blogRepo->update($data,$id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->blogRepo->delete($id);
        session()->flash('success' , 'Deleted successfully');
        return back();
    }
}
