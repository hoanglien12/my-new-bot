<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAddProductRequest;
use App\Http\Requests\AdminEditProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Order;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->pro         = new Product();
        $this->product_cate = new ProductCategory();
        view()->share('orders_waiting',count(Order::where('status',1)->get()));
        

    }
    public function index(Request $request){
        $name = $request->input('name');
        $category_id = $request->input('category_id');
        $price = $request->input('price');
        $begin_date = $request->input('begin_date');
        $end_date = $request->input('end_date');
        $count_products = count($this->pro->getAllProducts($name, $category_id,$price, $begin_date, $end_date)->get());
        $product = $this->pro->getAllProducts($name, $category_id, $price, $begin_date, $end_date)->get();
        $product_cate = $this->product_cate->getAllProductCategories()->get();
        return view('admin.product.show', compact('product','product_cate','count_products','category_id', 'begin_date', 'end_date','sale','orders_waiting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = ProductCategory::all();

        return view('admin.product.add', compact('cate','orders_waiting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminAddProductRequest $request)
    {
        $sale         = null;
        if(empty($request->get('sale'))) {
            $sale = 0;
        }

        $product = new Product;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sale = $sale;

        $files = $request->file('photos');
        $filename_arr = [];
        $i = 1;
        foreach ($files as $file){
            $filename = $i . time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/upload/product'), $filename);
            $filename_arr[] = $filename;
            $i++;
        }
        $product->photos = json_encode($filename_arr);
        $product->id_product_cate = $request->product_cate;
        $product->save();
        
        return redirect()->route('product.show')->with('success', 'Add '. $request->name . ' successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = ProductCategory::all();
        $product = Product::find($id);

        return view('admin.product.edit', compact('product', 'cate','orders_waiting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminEditProductRequest $request, $id)
    {
        $product = Product::find($id);
        $sale         = null;
        if(empty($request->get('sale'))) {
            $sale = 0;
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->sale = $sale;
        if($files = $request->file('photos'))
        {
            $filename_arr = [];
            $i =1;
            foreach ($files as $file){
                $filename = $i . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/upload/product'), $filename);
                $filename_arr[] = $filename;
                $i++;
            }
            $product->photos = json_encode($filename_arr);
        }
        $product->id_product_cate = $request->product_cate;
        $product->save();
        
        return redirect()->route('product.show')->with('success', 'Edit ' . $request->name . ' successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', 'Delete ' . $product->name . ' successful!');
    }
}
