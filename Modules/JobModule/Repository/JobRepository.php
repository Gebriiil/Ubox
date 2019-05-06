<?php

namespace Modules\JobModule\Repository;
use Modules\JobModule\Entities\Job;
use Modules\JobModule\Entities\Skill;

class JobRepositry{

	public function findAll()
	{
		$Jobs=Job::all();
		return $Jobs;
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
		$skills = explode($skills , ',');
		
		foreach($skills as $skill):

			Skill::create([
				'job_id' => $Job->id,
				'name' => $skill
			]);
			
		endforeach;

		return $Job;
	}
	public function update($data,$id)
	{
		$Job=Job::find($id);
		$Job->update($data);
		return $Job;
	}
	public function delete($id)
	{
		Job::destroy($id);
	}

}

?>