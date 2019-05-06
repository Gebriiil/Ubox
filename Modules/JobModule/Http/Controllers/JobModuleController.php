<?php

namespace Modules\JobModule\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\JobModule\Entities\Job;

class JobModuleController extends Controller {
	/**
	 * Display a listing of the resource.
	 * @return Response
	 */
	public function index() {
		$jobs = Job::all();

		return view('jobmodule::index', compact('jobs'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return Response
	 */
	public function create() {

		return view('jobmodule::create_job');
	}

	/**
	 * Store a newly created resource in storage.
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request) {
		//
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
		return view('jobmodule::edit');
	}

	/**
	 * Update the specified resource in storage.
	 * @param Request $request
	 * @param int $id
	 * @return Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * @param int $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}
}
