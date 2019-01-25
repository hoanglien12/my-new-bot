<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $fillable = [
        'id_order', 'id_product', 'id_dog', 'price', 'quantity', 'amount', 'created_at', 'updated_at'
    ];
    public function order()
    {
    	return $this->belongsTo('App\Models\Order', 'id_order','id');
    }

    public function dog()
    {
    	return $this->belongsTo('App\Models\Dog', 'id_dog','id');
    }
    public function product()
    {
    	return $this->belongsTo('App\Models\Product', 'id_product','id');
    }
}
