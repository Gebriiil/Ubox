<?php

namespace Modules\JobModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\JobModule\Entities\Job;
use Modules\JobModule\Repository\JobRepository;
use Modules\JobModule\Repository\JobCategoryRepository;

class JobModuleController extends Controller {
	/**
	 * Display a listing of the resource.
	 * @return Response
	 */

	function __construct(JobRepository $jobRepository , JobCategoryRepository $jobCategoryRepository)
	{
		$this->jobRepository = $jobRepository;
		$this->jobCategoryRepository = $jobCategoryRepository;
	}

	public function index() {
		$jobs = Job::all();
		return view('jobmodule::index', compact('jobs'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create() {
		$categories = $this->jobCategoryRepository->findAll();
		return view('jobmodule::create_job' , compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request) {
		

        $rules=[];
        foreach(config('translatable.locales') as $locale){
            $rules+=[$locale . '.*'=>'required'];
        }
		$rules+=['image'=>'required|image|mimes:jpg,png,jpeg,JPG,PNG,JPEG'];
		$rules+=['skills'=>'required|string'];
		
        $request->validate($rules);
		$image_name= image_name($request->image);
		
		$skills = request('skills');
		$data=$request->except(['image' , 'skills']);
		
		image_upload($request->image , $image_name) ;

		
		$data['image']=$image_name;

        $this->jobRepository->save($data , $skills);

        session()->flash('success' , __('trainingmodule::training.success'));
        return redirect(route('jobs_index'));

	}

	/**
	 * Show the specified resource.
	 * @param int $id
	 * @return Response
	 */
	public function show($id) {
		return view('jobmodule::show');
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param int $id
	 * @return Response
	 */
	public function edit($id) {
		$job = $this->jobRepository->findById($id);

		return view('jobmodule::edit' , compact('job'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param Request $request
	 * @param int $id
	 * @return Response
	 */
	public function update(Request $request, $id) {
		
		$rules=[];
        foreach(config('translatable.locales') as $locale){
            $rules+=[$locale . '.title'=>'required'];
            $rules+=[$locale . '.description'=>'required'];
        }
		$rules+=['image'=>'image|mimes:jpg,png,jpeg,JPG,PNG,JPEG'];
		$rules+=['skills'=>'required|string'];

		$request->validate($rules);
		$data=$request->except(['image' , 'skills']);

		if($request->hasFile('image')){

			$image_name= image_name($request->image);
			
			image_upload($request->image , $image_name) ;

			
			$data['image']=$image_name;

		}

		
		$skills = request('skills');

		

        $this->jobRepository->update($id ,$data , $skills);

        session()->flash('success' , __('trainingmodule::training.success'));
        return redirect(route('jobs_index'));



	}

	/**
	 * Remove the specified resource from storage.
	 * @param int $id
	 * @return Response
	 */
	public function destroy($id) {
		$this->jobRepository->delete($id);
        session()->flash('success' , 'Deleted successfully');
        return back();
	}
}
