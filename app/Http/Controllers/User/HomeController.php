<?php

namespace App\Http\Controllers\User;

use App\Model\user\Category;
use App\Model\user\Post;
use App\Model\user\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function post(Request $request){

        $posts = DB::table('posts')->paginate(5);

        /*if ($request->ajax()) {
            $postId = $request->id;
            $onePost = Post::find($postId);

            $like = $request -> like;

            if($like == 'like'){
                $onePost -> like = $onePost -> like + 1;
                $onePost -> save();
            } else if($like == 'remove-like'){
                $onePost -> like = $onePost -> like - 1;
                $onePost -> save();

            }



        }*/









        return view('user.blog',compact(['posts']));
    }



    public function tag(Tag $tag){

        $posts = $tag -> posts();

        return view('user.blog', compact(['posts']));
    }

    public function category(Category $category){

        $posts = $category -> posts();

        return view('user.blog', compact(['posts']));
    }

   /* public function likePost($id, Request $request){
        $post = Post::find($id);
        $countLike = $post -> like;

        if ($request->ajax()) {
            $countLike = $countLike + 1;
        }
        dump($countLike);
die();
        return view('user.blog',compact(['countLike']));
    }*/






}
