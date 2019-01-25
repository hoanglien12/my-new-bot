<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;


class CommentController extends Controller
{
    function __construct()
	{
	    $this->comment = new Comment();
	    view()->share('orders_waiting',count(Order::where('status',1)->get()));
	}

	public function index()
	{
		
		$comments		= Comment::all();
		
		// dd($comments);
		return view('admin.comment.index',compact('comments','orders_waiting'));
	}
}
