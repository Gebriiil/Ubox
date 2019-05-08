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

use Modules\UboxFrontModule\Entities\Newsletter;

use Modules\BlogModule\Repository\CommentRepository;
use Modules\TrainingModule\Repository\TrainingRepository;
use DB;
use App\Mail\ContactUs;
use Mail;
use Modules\TrainingModule\Repository\TrainingCategoryRepository;
use Modules\JobModule\Repository\JobRepository;
use Modules\JobModule\Repository\JobCategoryRepository;

class FrontModuleController extends Controller
{



    private $categoryRepo,$projectRepo,$blogrepository;

    public function __construct(
        Project_CategoryRepository $categoryRepo,
        ProjectRepository $projectRepo,
        BlogRepositry $blogrepository,
        CommentRepository $commentRepository,
        TrainingRepository $trainingRepository,
        TrainingCategoryRepository $trainingCategoryRepository,
        JobRepository $jobRepository, 
        JobCategoryRepository $jobCategoryRepository
    )
    {
        $this->categoryRepo = $categoryRepo;
        $this->blogrepository = $blogrepository;
        $this->projectRepo = $projectRepo;
        $this->commentRepository = $commentRepository;
        $this->trainingCategoryRepository = $trainingCategoryRepository;
        $this->trainingRepository = $trainingRepository;
        $this->jobRepository = $jobRepository;
		$this->jobCategoryRepository = $jobCategoryRepository;

    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function contact_us()
    {

        $page_name='contact_us';
        return view('uboxfrontmodule::pages.contact_us',  compact('page_name'));
    }

    public function sendToContact(){

        
        $data = request()->validate([
    
            'subject' => 'required|string',
            'email' => 'required|email',
            'name' => 'required|string|max:50',
            'message' => 'required|string',

        ]);

        Mail::to('ubox@gmail.com')->send(new ContactUs([
            'email' => request('email'),
            'subject' => request('subject'),
            'message' => request('message'),
            'name' => request('name'),
        ]));

        return back()->with('success', trans('uboxfrontmodule::front.data_send') );

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
        $news =  $this->blogrepository->findAllByLimit(3);

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
        $recent_news = $this->blogrepository->findAllByLimit(3 , $id);
        $comments = $this->commentRepository->findAllByPagination( $id);
        
        return view('uboxfrontmodule::pages.new',compact('new','name' , 'recent_news', 'comments'));

    }

    public function comment($id)
    {

        $comments = $this->commentRepository->save(request()->all());
        
        return back()->with('success' , trans('uboxfrontmodule::front.your_review_added'));
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
    
    public function add_to_newsletters(Request $request)
    {
        // $mail=Newsletter::where('email',$request->email)->get();
        // if(isset($mail)){
        //     return response()->json(['error'=>'Already Exists']);
        // }
        $data=request()->all();
        Newsletter::create($data);
        return response()->json(['success'=>'success']); 
    }


    public function training(){


        $training = $this->trainingRepository->findAllByPagination();
        
        if( request()->ajax() ){

            return response( view('uboxfrontmodule::pages.training_of_category',compact('training'))->render() , 200 );
        }
        
        $categories=$this->trainingCategoryRepository->findAll();

        $page_name= trans('commonmodule::sidebar.training');

        return view('uboxfrontmodule::pages.training',compact('training','name' , 'categories'));

    }

    public function jobs(){


        $jobs = $this->jobRepository->findAllByPagination();

        if(request()->ajax()){
            return response( view('uboxfrontmodule::pages.job_cards',compact('jobs') )->render() );
        }

		$categories = $this->jobCategoryRepository->findAll();

        $page_name= trans('commonmodule::sidebar.jobs');

        return view('uboxfrontmodule::pages.jobs',compact('jobs','name' , 'categories'));

    }

    

    public function job($id)
    {
        $job = $this->jobRepository->findById($id);
        $page_name= $job->title;

        return view('uboxfrontmodule::pages.only_job',compact('job','name'));

    }

}
