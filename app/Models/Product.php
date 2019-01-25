<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    public function productcategory()
    {
    	return $this->belongsTo('App\Models\ProductCategory', 'id_product_cate', 'id');
    }

    public function detail_order()
    {
        return $this->belongsTo('App\Models\DetailOrder', 'id_order','id');
    }
    
    public function getAllProducts($name=null, $category_id=null,$price=null, $begin_date=null, $end_date=null)
    {
        $products = Product::query();
        if($name != null){
            $products = $products->where('name','like',"%$name%");
        }
        if($category_id != null){
            $products = $products->where('id_product_cate',$category_id);
        }
        if($price != null){
            $products = $products->where('price',$price)
                                ->orWhere('sale',$price);
        }
        
        if($begin_date != null){
            $products = $products->whereDate('created_at','>=',date('Y-m-d', strtotime($begin_date)));
        }
        if($begin_date != null && $end_date != null){
            $products = $products->whereBetween(DB::raw('DATE(created_at)'), array(date('Y-m-d', strtotime($begin_date)), date('Y-m-d', strtotime($end_date))));
        }
    	return $products;
    }

    public function getImage($idProduct)
	{
		$product = Product::find($idProduct);
		$images = $product->photos;
		$imgs = json_decode($images);
		
		return $imgs;
	}
}
