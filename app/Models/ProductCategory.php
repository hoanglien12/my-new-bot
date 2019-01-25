<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;

class ProductCategory extends Model
{
    public function product()
    {
    	return $this->hasMany('App\Models\Product', 'id_product_cate', 'id');
    }

    public function getAllProductCategories($name = null, $begin_date = null,$end_date = null)
    {
        $productCategories = ProductCategory::query();
        if($name != null || $begin_date != null) {
            $productCategories = ProductCategory::where('name','like', "%$name%");
        }
        if($begin_date != null){
            $productCategories = ProductCategory::whereDate('created_at','>=',date('Y-m-d', strtotime($begin_date)));
        }
        if($begin_date != null && $end_date != null){
            $productCategories = ProductCategory::whereBetween(DB::raw('DATE(created_at)'), array(date('Y-m-d', strtotime($begin_date)), date('Y-m-d', strtotime($end_date))));
        }
        
        return $productCategories;
    }
}
