<?php

namespace App\Http\Controllers\User;

use App\Model\user\Category;
use App\Model\user\Post;
use App\Model\user\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function post(){

        $posts = DB::table('posts')->paginate(3);

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
