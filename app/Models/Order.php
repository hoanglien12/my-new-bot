<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Order extends Model
{
   	protected $fillable = [
        'id_user', 'name', 'address', 'phone', 'description', 'shipping', 'total', 'date', 'status', 'created_at', 'updated_at'
    ];
    public function detail_order()
    {
    	return $this->hasMany('App\Models\DetailOrder', 'id_order', 'id');
    }

    public function getAllOrders($name=null, $phone=null,$address=null,$ship=null, $status=null,  $begin_date=null, $end_date=null)
    {
        $orders = Order::query();
        if($name != null){
            $orders = $orders->where('name','like',"%$name%");
        }
        if($phone != null){
            $orders = $orders->where('phone','like',"%$phone%");
        }
        if($address != null ){
            $orders = $orders->where('address','like',"%$address%");
        }
        if($ship != null ){
            $orders = $orders->where('shipping',$ship);
            // dd($orders);
        }
        if($status != null ){
            $orders = $orders->where('status',$status);
        }
        if($begin_date != null){
            $orders = $orders->whereDate('created_at','>=',date('Y-m-d', strtotime($begin_date)));
        }
        if($begin_date != null && $end_date != null){
            $orders = $orders->whereBetween(DB::raw('DATE(created_at)'), array(date('Y-m-d', strtotime($begin_date)), date('Y-m-d', strtotime($end_date))));
        }
    	return $orders;
    }
}
