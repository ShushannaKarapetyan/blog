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
    public function post(){
        $posts = DB::table('posts')->paginate(5);

        return view('user.blog',compact(['posts']));
    }

    public function search(Request $request){
        $search_post = $request->input('post-search');;
        if($search_post != ''){
            $search_posts = Post::where('title', 'Like','%' . $search_post . '%')
                ->orWhere('subtitle', 'Like','%' . $search_post . '%')
                ->get();
            if(count($search_posts) > 0){
                return view('user.search', compact(['search_posts','search_post']));
            }
        }
        $posts = DB::table('posts')->paginate(5);
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





}
