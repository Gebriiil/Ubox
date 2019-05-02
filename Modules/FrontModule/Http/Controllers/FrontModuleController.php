<?php

namespace Modules\FrontModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\View\View;
use Modules\ProductModule\Repository\ProductRepository;
use Modules\ProductModule\Repository\OfferRepositry;
use Modules\ProductModule\Repository\ProductPhotoRepository;
use Modules\BlogModule\Repository\BlogRepository;
use Modules\ConfigModule\Entities\Video;
use Modules\ProjectModule\Repository\Project_CategoryRepository;

class FrontModuleController extends Controller
{



    private $productRepo, $categoryRepo, $productPicRepo,$OfferRepo;

    public function __construct(
        Project_CategoryRepository $categoryRepo
    )
    {
        $this->categoryRepo = $categoryRepo;

    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function contact_us()
    {
        $categories=$this->categoryRepo->findAll();
        $page_name='contact_us';
        return view('frontmodule::pages.contact_us',  compact('categories','page_name'));
    }
    public function about_us()
        {
            $categories=$this->categoryRepo->findAll();
            $page_name='about_us';
            return view('frontmodule::pages.about',  compact('categories','page_name'));
        }
    public function blog()
    {
        $categories=$this->categoryRepo->findAll();
        $blogs= $this->blogrepository->findAllByLimit();
        $page_name='blog';
        return view('frontmodule::pages.blog',  compact('categories','page_name','blogs'));
    }
    public function index()
    {

        $categories=$this->categoryRepo->findAll();

        $page_name='index';

        return view('frontmodule::index');

        //return view('frontmodule::index',compact('categories'));
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
        return view('frontmodule::pages.videos',compact('videos','page_name'));
    }

    public function services()
    {
        $page_name='services';
        return view('frontmodule::pages.services',compact('page_name'));
    }
}
