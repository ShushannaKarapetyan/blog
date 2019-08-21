<?php

namespace App\Http\Controllers\User;

use App\Model\user\Category;
use App\Model\user\Message;
use App\Model\user\Post;
use App\Model\user\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    public function post(){
        $posts = DB::table('posts')->paginate(10);
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
        $posts = DB::table('posts')->paginate(10);
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

    public function contact(){

        return view('user.contact');
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'message' => 'required|max:1000',
        ]);

        $message = new Message();
        $message->user_id = Auth::user()->id;
        $message->message = $request->message;
        $message->save();

        Mail::send(['text' => 'user/message'], ['name' => Auth::user()->name], function ($message) {
            $message_text = Input::get('message');
            $message->to('shushanna.karapetyan.97@gmail.com', 'To ' . Auth::user()->name)->subject($message_text);
            $message->from(Auth::user()->email, Auth::user()->name);
        });

        return redirect()->back()->with('success','You Send Message Successfully. Thank You!');
    }

    public function about(){
        return view('user.about');
    }
}
