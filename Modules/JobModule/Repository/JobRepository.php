<?php

namespace Modules\JobModule\Repository;
use Modules\JobModule\Entities\Job;
use Modules\JobModule\Entities\Skill;
use File ;
class JobRepository{

	public function findAll()
	{
		$Jobs=Job::all();
		return $Jobs;
	}

	function findAllByPagination()
    {
        return Job::where(function($query) {
			
			return $query->when( request('type') , function($query){
				return $query->where('type' , request('type') );
			});

		})->where(function($query) {
			
			return $query->when( request('category_id') , function($query){
				return $query->where('job_category_id' , request('category_id') );
			});

		})->paginate(5);
    }

	public function findAllByLimit($num = 4 , $exclude = '')
	{
		$Jobs=Job::where(function($query) use($exclude) {
			
			return $query->when($exclude , function($query)  use($exclude){
				return $query->where('id' , '!=' , $exclude);
			});

		})->limit($num)->latest()->get();

		return $Jobs;
	}
	public function findById($id)
	{
		$Job=Job::find($id);
		return $Job;
	}
	public function save($data , $skills)
	{
		

		$Job=Job::create($data);

		$skills = explode(',' , $skills);		
		

		foreach($skills as $skill):
			

			$new_skill = Skill::create([
				'job_id' => $Job->id,
				'name' => $skill
			]);

		endforeach;

		return $Job;
	}
	public function update($id , $data,$skills)
	{
		$Job=Job::find($id);

		File::delete( asset('upload' , $Job->image) );

		$Job->update($data);

		foreach($Job->skills as $skill):
		
			$skill->delete();
		
		endforeach;


		$skills = explode(',' , $skills);		
		

		foreach($skills as $skill):
			

			$new_skill = Skill::create([
				'job_id' => $id,
				'name' => $skill
			]);

		endforeach;

		return $Job;
	}
	public function delete($id)
	{
		$job = $this->findById($id);

		File::delete( asset('upload' , $job->image) );
		Job::destroy($id);
	}

}

?>