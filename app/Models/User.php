<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address', 'phone',
    ];

    public function role()
    {
        return $this->belongsTo('Role', 'id_role');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAllUsers($name = null,$role = null, $begin_date = null,$end_date = null)
    {
        $users = User::query();
        if($name != null) {
            $users = $users->where('name','like', "%$name%");
        }
        if($role != null) {
            $users = $users->where('id_role',$role);
        }
        if($begin_date != null){
            $users = $users->whereDate('created_at','>=',date('Y-m-d', strtotime($begin_date)));
        }
        if($begin_date != null && $end_date != null){
            $users = $users->whereBetween(DB::raw('DATE(created_at)'), array(date('Y-m-d', strtotime($begin_date)), date('Y-m-d', strtotime($end_date))));
        }
        
        return $users;
    }
}
