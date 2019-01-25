<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
class UserController extends Controller
{
	function __construct()
	{
	    $this->user = new User();
	    view()->share('orders_waiting',count(Order::where('status',1)->get()));
        
	    
	}

	public function index(Request $request)
	{
		$name 		 = $request->input('name');
		$role 		 = $request->input('role');
		$begin_date  = $request->input('begin_date');
		$end_date 	 = $request->input('end_date');
		// dd($request->all());
		$users		 = $this->user->getAllUsers($name,$role,$begin_date,$end_date)->get();
		// dd($users);
		return view('admin.user.index',compact('users','orders_waiting'));
	}
}
