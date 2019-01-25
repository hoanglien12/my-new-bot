<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $guarded = ['id'];

    public function getAllDogPosts($title = null,$status = null, $type = null, $begin_date = null,$end_date = null)
    {
        $posts = Post::query();
        if($title != null) {
            $posts = Post::where('title','like', "%$title%");
        }
        if($status != null){
            $posts = Post::where('active',$status);
        }
        if($type != null){
            $posts = Post::where('hot',$type);
        }
        if($begin_date != null){
            $posts = Post::whereDate('created_at','>=',date('Y-m-d', strtotime($begin_date)));
        }
        if($begin_date != null && $end_date != null){
            $posts = Post::whereBetween(DB::raw('DATE(created_at)'), array(date('Y-m-d', strtotime($begin_date)), date('Y-m-d', strtotime($end_date))));
        }
        
        return $posts;
    }

    public function getImage($id)
    {
        $post    = Post::find($id);
        $images  = $post->image;
        $imgs    = json_decode($images);
        return $imgs;
    }
    public function count_cmt($id_post)
    {
        return Comment::where('id_post', $id_post)->count();
    }
}
