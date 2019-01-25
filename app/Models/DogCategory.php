<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Dog;
use Illuminate\Support\Facades\DB;

class DogCategory extends Model
{
	protected $table = 'dog_categories';
    protected $guarded = ['id'];
    protected $fillable = [
        'name', 'description','created_at', 'updated_at'
    ];
    
    public function dog()
    {
    	return $this->hasMany('App\Models\Dog', 'id_dog_cate', 'id');
    }

    
    
    public function getAllDogCategories($name = null, $begin_date = null,$end_date = null)
    {
        $dogCategories = DogCategory::query();
        if($name != null || $begin_date != null) {
            $dogCategories = DogCategory::where('name','like', "%$name%");
        }
        if($begin_date != null){
            $dogCategories = DogCategory::whereDate('created_at','>=',date('Y-m-d', strtotime($begin_date)));
        }
        if($begin_date != null && $end_date != null){
            $dogCategories = DogCategory::whereBetween(DB::raw('DATE(created_at)'), array(date('Y-m-d', strtotime($begin_date)), date('Y-m-d', strtotime($end_date))));
        }
        
        return $dogCategories;
    }
}
