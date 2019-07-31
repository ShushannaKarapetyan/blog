<?php

namespace App\Http\Controllers\User;

use App\Model\user\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        $posts = DB::table('posts')->paginate(3);
        return view('user.blog',compact(['posts']));
    }
}
