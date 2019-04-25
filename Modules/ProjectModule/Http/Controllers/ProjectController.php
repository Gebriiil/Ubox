<?php

namespace Modules\ProjectModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use  Modules\ProjectModule\Entities\Project;
use App\DataTables\ProjectDatatable;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index( ProjectDatatable $projectdatatable)
    {
        return $projectdatatable->render('projectmodule::projects.index')
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
        //return view('projectmodule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //return view('projectmodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //return view('projectmodule::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
