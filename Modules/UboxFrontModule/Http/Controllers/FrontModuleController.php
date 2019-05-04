<?php

namespace Modules\UboxFrontModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\BlogModule\Repository\BlogRepositry;
use Modules\ProjectModule\Repository\Project_CategoryRepository;
use Modules\ProjectModule\Repository\ProjectRepository;
use Modules\ProjectModule\Entities\Project;

class FrontModuleController extends Controller
{



    private $categoryRepo,$projectRepo,$blogrepository;

    public function __construct(
        Project_CategoryRepository $categoryRepo,
        ProjectRepository $projectRepo,
        BlogRepositry $blogrepository
    )
    {
        $this->categoryRepo = $categoryRepo;
        $this->blogrepository = $blogrepository;
        $this->projectRepo = $projectRepo;

    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function contact_us()
    {
        $categories=$this->categoryRepo->findAll();
        $page_name='contact_us';
        return view('uboxfrontmodule::pages.contact_us',  compact('categories','page_name'));
    }
    public function about_us()
        {
            $categories=$this->categoryRepo->findAll();
            $page_name='about_us';
            return view('uboxfrontmodule::pages.about',  compact('categories','page_name'));
        }
    public function blog()
    {
        $categories=$this->categoryRepo->findAll();
        $blogs= $this->blogrepository->findAll();
        $page_name='blog';
        return view('uboxfrontmodule::pages.blog',  compact('categories','page_name','blogs'));
    }
    public function index()
    {
        $categories= $this->categoryRepo->findAll();
        $news =  $this->blogrepository->findAll();

        return view('uboxfrontmodule::index',compact('categories' , 'news'));
    }
    public function projects_only()
    {
        $name="customer";
        $id=request('name'); 
        //$category=$this->categoryRepo->findById($id);
        $projects=Project::with(['translations'])->where('project_cat_id',$id)->get();
        return view('uboxfrontmodule::Ajax.projects',compact('projects','name'));
    }

    public function projects()
    {
        $categories=$this->categoryRepo->findAll();
        $page_name='Projects';

        return view('uboxfrontmodule::pages.projects',compact('categories','name'));
    }

    public function new($id)
    {
        $new = $this->blogrepository->findById($id);
        $page_name= $new->title;

        return view('uboxfrontmodule::pages.new',compact('new','name'));

    }

    
    
    public function videos()
    {
        $videos=Video::all();
        $page_name='videos';
        return view('uboxfrontmodule::pages.videos',compact('videos','page_name'));
    }
    public function services()
    {
        $page_name='services';
        return view('uboxfrontmodule::pages.services',compact('page_name'));
    }
}
