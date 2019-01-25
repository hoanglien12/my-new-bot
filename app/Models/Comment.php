<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;
use App\Models\Dog;

class Comment extends Model
{
    protected $fillable = [
        'id_user', 'comment', 'id_product', 'id_dog', 'id_post', 'created_at', 'updated_at'
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function product()
    {
    	return $this->belongsTo('App\Models\Product', 'id_product');
    }

    public function dog()
    {
    	return $this->belongsTo('App\Models\Dog', 'id_dog');
    }
    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'id_post');
    }

    
}
