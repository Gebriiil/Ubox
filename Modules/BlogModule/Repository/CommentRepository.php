<?php

namespace Modules\BlogModule\Repository;
use Modules\BlogModule\Entities\Comment;
class CommentRepository{

	public function findAll($id)
	{
		$Comments=Comment::where('blog_id' , $id)->get();
		return $Comments;
    }
    
    public function findAllByPagination($id)
	{
        $Comments=Comment::where('blog_id' , $id)->paginate(2);

        return $Comments;
        
	}
    
    
	public function findById($id)
	{
		$Comment=Comment::find($id);
		return $Comment;
	}
    
    public function save($data)
	{
        
       // dd( $data );
		$Comment=Comment::create($data);
		return $Comment;
	}
    
    
    public function delete($id)
	{
		$Comment=Comment::find($id);
		Comment::destroy($Comment);

	}

}

?>