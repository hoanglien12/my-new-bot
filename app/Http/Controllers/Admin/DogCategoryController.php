<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DogCategory;
use App\Models\Dog;
use App\Models\Order;
use App\Http\Requests\AdminDogCategoryRequest;
use App\Http\Requests\AdminEditDogCategoryRequest;

class DogCategoryController extends Controller
{
	public function __construct()
	{
		$this->dogCategory = new DogCategory();
        view()->share('orders_waiting',count(Order::where('status',1)->get()));
        
	}

	
    public function index(Request $request){
        $request->flash();
        $name           = $request->input('name');
        $begin_date     = $request->input('begin_date');
        $end_date       = $request->input('end_date');

        $count_category = count($this->dogCategory->getAllDogCategories($name, $begin_date, $end_date)->get());
        $dogCategories  = $this->dogCategory->getAllDogCategories($name,$begin_date,$end_date)->get();
        
        return view('admin.dog-category.index',compact('dogCategories','name','date','end_date','count_category','orders_waiting'));
    }

    public function add()
    {
        return view('admin.dog-category.create',compact('orders_waiting'));
    }

    public function store(AdminDogCategoryRequest $request){
    	// dd($request->origin);
        $store    		  = DogCategory::create([
            'name'        => $request->name,
            'description' => $request->description
        ]);
        // dd($store);
        if (!$store) {
            $request->session()->flash('warning','Insert ' .$request->name. ' fail');
        }
        else
        {
            $request->session()->flash('success','Insert ' .$request->name. ' successfully');
        }
        return redirect()->route('dog_category.index');
    }

    public function edit($id){
        $dogCategory = DogCategory::findOrFail($id);
        return view('admin.dog-category.edit', compact('dogCategory','orders_waiting'));
    }

    public function update(AdminEditDogCategoryRequest $request,$id){
        $request->flash();
        $update      = DogCategory::findOrFail($id);
        $update->update([
            'name'        => $request->name,
            'description' => $request->description
        ]);
        if(!$update){
            $request->session()->flash('warning','Update fail');
        }
        else{
            $request->session()->flash('success','Update ' .$request->name. ' successfully');
        }
        return redirect()->route('dog_category.index');
    }

    public function delete(Request $request,$id){
        $request->flash();
        $dogs       = Dog::where('id_dog_cate', $id)->get();
        $countDogs  = count($dogs);
        // dd($countDogs);

        if($countDogs > 0){
            $request->session()->flash('warning', 'Delete fail because this category has dogs!');
        }
        else{
            $delete = DogCategory::findOrFail($id);
            $delete->delete();
            if (!$delete) {
                // dd(1);
                $request->session()->flash('warning', 'Delete fail');
            }
            else
            {
                $request->session()->flash('success', 'Delete ' .$delete->name. ' successfully!');
            }
        }
        return redirect()->route('dog_category.index');
    }
}
