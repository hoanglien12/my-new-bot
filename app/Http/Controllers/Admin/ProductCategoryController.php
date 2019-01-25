<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\AdminAddProductCategoryRequest;
use App\Http\Requests\AdminEditProductCategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Order;
class ProductCategoryController extends Controller
{
    public function __construct()
    {
        $this->productCategory = new ProductCategory();
        view()->share('orders_waiting',count(Order::where('status',1)->get()));
        

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        $begin_date = $request->input('begin_date');
        $end_date = $request->input('end_date');
        $count_category = count($this->productCategory->getAllProductCategories($name, $begin_date, $end_date)->get());
        $cate = $this->productCategory->getAllProductCategories($name,$begin_date,$end_date)->get();
        return view('admin.product-category.show',compact('cate','name','begin_date','end_date','count_category','orders_waiting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product-category.add',compact('orders_waiting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminAddProductCategoryRequest $request)
    {
        $cate = new ProductCategory();
        $cate->name = $request->name;
        $cate->description = $request->description;
        $cate->save();

        return redirect()->route('product_category.show')->with('success', 'Add ' . $request->name . ' successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = ProductCategory::find($id);

        return view('admin.product-category.edit', compact('orders_waiting', 'cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminEditProductCategoryRequest $request, $id)
    {
        $cate = ProductCategory::find($id);
        $cate->name = $request->name;
        $cate->description = $request->description;
        $cate->save();

        return redirect()->route('product_category.show')->with('success', 'Edit '. $request->name . ' successful!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id_product_cate', $id)->get();
        $numProduct = count($product);
        if($numProduct > 0)
        {
            return redirect()->back()->with('fail', 'You can not delete this product category because it has product!');
        }
        else{
            $cate = ProductCategory::findOrFail($id);
            $cate->delete();

            return redirect()->back()->with('success', 'Delete ' . $cate->name . ' successful!');
        }
    }
}
