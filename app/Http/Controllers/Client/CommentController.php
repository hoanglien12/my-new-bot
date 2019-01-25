<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    function __construct()
	{
	    $this->comment = new Comment();
	}

	public function comment_dog(Request $request)
	{
		if($request->comment != ""){
			$id_user = Auth::user()->id;
			$data = array(
	            'id_user' => $id_user,
	            'id_dog' => $request->id_dog,
	            'comment' => $request->comment,
	        );
	        $this->comment->create($data);
	        
	        return redirect()->back();  
		}
		else{
			return redirect()->back();
		}
	}

	public function comment_post(Request $request)
	{
		if($request->comment != ""){
			$id_user = Auth::user()->id;
			$data = array(
	            'id_user' => $id_user,
	            'id_post' => $request->id_post,
	            'comment' => $request->comment,
	        );
	        $this->comment->create($data);
	        
	        return redirect()->back();  
		}
		else{
			return redirect()->back();
		}
	}

	public function comment_product(Request $request)
	{
		if($request->comment != ""){
			$id_user = Auth::user()->id;
			$data = array(
	            'id_user' => $id_user,
	            'id_product' => $request->id_product,
	            'comment' => $request->comment,
	        );
	        $this->comment->create($data);
	        
	        return redirect()->back();  
		}
		else{
			return redirect()->back();
		}
	}
}
