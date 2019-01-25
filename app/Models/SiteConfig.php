<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class SiteConfig extends Model
{
    protected $table = 'site_config';
    protected $guarded = ['id'];
    protected $fillable = [
        'type', 'value','label','created_at', 'updated_at'
    ];

    public function getAllConfigs($label=null,$type=null, $begin_date=null, $end_date=null)
    {
        $configs = SiteConfig::query();
        if($label != null){
            $configs = $configs->where('label','like',"%$label%");
        }
        if($type != null){
            $configs = $configs->where('type',$type);
        }
        
        if($begin_date != null){
            $configs = $configs->whereDate('created_at','>=',date('Y-m-d', strtotime($begin_date)));
        }
        if($begin_date != null && $end_date != null){
            $configs = $configs->whereBetween(DB::raw('DATE(created_at)'), array(date('Y-m-d', strtotime($begin_date)), date('Y-m-d', strtotime($end_date))));
        }
    	return $configs;
    }
}
