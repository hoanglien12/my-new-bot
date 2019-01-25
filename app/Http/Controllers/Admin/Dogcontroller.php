<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminDogRequest;
use App\Http\Requests\AdminEditDogRequest;
use App\Http\Controllers\Controller;
use App\Models\Dog;
use App\Models\DogCategory;
use App\Models\Order;



class DogController extends Controller
{
    protected $dog;
	protected $dog_category;
	public function __construct(){
		$this->dog 			= new Dog();
		$this->dog_category = new DogCategory();
	    view()->share('orders_waiting',count(Order::where('status',1)->get()));
        

	}
	public function index(Request $request){
		$request->flash();
        $name           = $request->input('name');
        $category_id	= $request->input('category_id');
        $price			= $request->input('price');
        $begin_date     = $request->input('begin_date');
        $end_date       = $request->input('end_date');

        $count_dogs 	= count($this->dog->getAllDogs($name, $category_id,$price, $begin_date, $end_date)->get());
        // dd($count_dogs);
		$dogs 			= $this->dog->getAllDogs($name, $category_id, $price, $begin_date, $end_date)->get();
		// dd($category_id);
		$dog_category   = $this->dog_category->getAllDogCategories()->get();
		// dd($dog_category);
		return view('admin.dog.index', compact('dogs','dog_category','count_dogs','category_id','orders_waiting'));
	}

	public function add()
	{
		$dog_category = $this->dog_category->getAllDogCategories()->get();
		return view('admin.dog.create',compact('dog_category','orders_waiting'));
	} 

	public function store(AdminDogRequest $request)
	{
		$request->flash();
		$birthday 	  = null;
		$sale 	      = null;
		if(empty($request->get('sale'))) {
			$sale = 0;
		}
		if(!empty($request->get('birthday'))) {
			$birthday = date('Y:m:d',strtotime($request->get('birthday')));
		}

		$filename_arr 	= [];
		$i 			= 1;
		//kiem tra ton tai file hay k
       	if($request->hasFile('photos')){
       		$files 	  = $request->file('photos');
       		foreach ($files as $file) {
       			$filename = $i . $file->getClientOriginalName();
            	$file->move(public_path('/upload/dogs'), $filename);
            	$filename_arr[] = $filename;
            	$i++;
			}
       	}
       	else{
       		echo 2; 
       	}
		$newDog = Dog::create([
                'name'          => $request->get('name'),
                'photos'		=> json_encode($filename_arr),
                'description'   => $request->get('description'),
                'id_dog_cate'   => $request->get('category_id'),
                'price'         => $request->get('price'),
                'sale'			=> $sale,
                'height'        => $request->get('height'),
                'weight'        => $request->get('weight'),
                'birthday'      => $birthday,
            ]);

		if(!$newDog){
			$request->session()->flash('warning','Insert fail');
		}
		else{
			$request->session()->flash('success','Insert ' .$request->name. ' successfully');
		}
        return redirect()->route('dog.index');
	}
	public function edit($id)
	{
		$dog 		  = Dog::findOrFail($id);
		$dog_category = $this->dog_category->getAllDogCategories()->get();
		return view('admin.dog.edit',compact('dog','dog_category','orders_waiting'));
	} 

	public function update(AdminEditDogRequest $request,$id)
	{
		$request->flash();
		$update       = Dog::query()->findOrFail($id);

		$sale 	      = null;
		if(empty($request->get('sale'))) {
			$sale = 0;
		}
		$birthday     = null;
		if(!empty($request->get('birthday'))) {
			$birthday = date('Y:m:d',strtotime($request->get('birthday')));
		}

		$filename_arr = [];
		$i 			  = 1;
		//kiem tra ton tai file hay k

       	if($files = $request->file('photos')){
       		$files 	  = $request->file('photos');
       		foreach ($files as $file) {
       			$filename = $i . $file->getClientOriginalName();
            	$file->move(public_path('/upload/dogs'), $filename);
            	$filename_arr[] = $filename;
            	$i++;
			}
			// dd($filename_arr);
			$update->photos = json_encode($filename_arr);
       	}
       	else{
       		echo 2; 
       	}

		$update->update([
			'name'          => $request->name,
			'id_dog_cate'   => $request->get('category'),
			// 'photos'		=> json_encode($filename_arr),
            'description'   => $request->description,
            'price'         => $request->price,
            'sale'			=> $sale,
            'birthday'      => $birthday,
            'height'        => $request->height,
            'weight'        => $request->weight
		]);
		// dd($update);
		if(!$update){
			$request->session()->flash('warning','Update fail');
		}
		else{
			$request->session()->flash('success','Update ' .$request->name. ' successfully');
		}
		return redirect()->route('dog.index');
	}

	public function delete(Request $request,$id)
	{
		$request->flash();
		$dog = Dog::findOrFail($id);
		$dog->delete();
		if(!$dog){
			$request->session()->flash('warning','Delete fail');
		}
		else{
			$request->session()->flash('success','Delete ' . $dog->name . ' successfully');
		}
		return redirect()->route('dog.index');
	}
}
