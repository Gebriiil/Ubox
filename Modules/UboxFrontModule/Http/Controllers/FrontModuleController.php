<?php

namespace Modules\UboxFrontModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\BlogModule\Repository\BlogRepositry;
use Modules\ProjectModule\Repository\Project_CategoryRepository;
use Modules\ProjectModule\Repository\ProjectRepository;

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
        $categories=$this->categoryRepo->findAll();
        return view('uboxfrontmodule::index',compact('categories'));
    }
    public function projects_only()
    {
        $name="customer";
        $id=request('name'); 
        $category=$this->categoryRepo->findById();
        return view('Ajax.projects',compact('category','name'));
    }

    public function language($lang)
    {
        session()->put('lang' , $lang);

        return back();
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
