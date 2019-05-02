<?php

namespace Modules\BlogModule\Repository;
use Modules\BlogModule\Entities\Blog;
class BlogRepositry{

	public function findAll()
	{
		$blogs=Blog::all();
		return $blogs;
	}
	public function findAllByLimit()
	{
		$blogs=Blog::limit(4);
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
		$blog=Blog::find($id);
		Blog::destroy($blog);

	}

}

?>