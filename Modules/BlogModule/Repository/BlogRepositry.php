<?php

namespace Modules\BlogModule\Repository;
use Modules\BlogModule\Entities\Blog;
class BlogRepositry{

	public function findAll()
	{
		$blogs=Blog::all();
		return $blogs;
	}
	public function findAllByLimit($num = 4 , $exclude = '')
	{
		$blogs=Blog::where(function($query) use($exclude) {
			
			return $query->when($exclude , function($query)  use($exclude){
				return $query->where('id' , '!=' , $exclude);
			});

		})->limit($num)->latest()->get();

		return $blogs;
	}
	public function findById($id)
	{
		$blog=Blog::find($id);
		return $blog;
	}
	public function save($data)
	{
		$blog=Blog::create($data);
		return $blog;
	}
	public function update($data,$id)
	{
		$blog=Blog::find($id);
		$blog->update($data);
		return $blog;
	}
	public function delete($id)
	{
		Blog::destroy($id);
	}

}

?>