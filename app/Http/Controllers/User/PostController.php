<?php

namespace App\Http\Controllers\User;

use App\Model\user\Dislike;
use App\Model\user\Post;
use App\Models\user\Like;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function post(Post $post){

        $likePost = Post::find($post->id);
        $likeCount = Like::where(['post_id' => $likePost ->id])->count();
        $dislikeCount = Dislike::where(['post_id' => $likePost ->id])->count();

        return view('user.post',compact(['post','likeCount','dislikeCount']));
    }

    public function like($id){

        $log_user = Auth::user()->id;
        $like_user = Like::where(['user_id' => $log_user, 'post_id' =>  $id])->first();
        if(empty($like_user -> user_id)){
            $user_id = Auth::user()->id;
            $post_id = $id;

            $like = new Like();
            $like -> user_id = $user_id;
            $like -> post_id = $post_id;
            $like -> save();

            return redirect()->back();

        } else {
            return redirect()->back();
        }

    }

    public function dislike($id){
        $log_user = Auth::user()->id;
        $like_user = Dislike::where(['user_id' => $log_user, 'post_id' =>  $id])->first();
        if(empty($like_user -> user_id)){
            $user_id = Auth::user()->id;
            $post_id = $id;

            $like = new Dislike();
            $like -> user_id = $user_id;
            $like -> post_id = $post_id;
            $like -> save();

            return redirect()->back();

        } else {
            return redirect()->back();
        }
    }



}
