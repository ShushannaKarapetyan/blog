<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\Category;
use App\Model\user\Post;
use App\Model\user\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $posts = Post::all();

        return view('admin.post.show', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->can('posts.create')){
            $tags = Tag::all();
            $categories = Category::all();
            return view('admin.post.post', compact(['tags','categories']));
        }
        return redirect(route('admin.home'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required|image|nullable|max:2000',
        ]);

        // Handle File Upload
        if($request->hasFile('image')){
            //Get Filename With The Extension
            $filenameWithExt = $request->file('image')->getClientMimeType();

            //Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get Just Ext
            $extension = $request->file('image')->getClientOriginalExtension(); //It's Format Of File

            //Filename To Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload Image
            $path = $request->file('image')->storeAs('public/post_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Post
        $post = new Post();
        $post -> title = $request -> title;
        $post -> subtitle = $request -> subtitle;
        $post -> slug = $request -> slug;
        $post -> body = $request -> body;
        $post -> image = $fileNameToStore;
        $post -> save();
        $post -> tags() -> sync($request -> tags);
        $post -> categories() -> sync($request -> categories);

        //$post -> posted_by = $request -> posted_by;
        //$post -> like = $request -> like;
        //$post -> dislike = $request -> dislike;

        return redirect(route('post.index'))->with('success','Post is created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->can('posts.update')) {
            $post = Post::with('tags', 'categories')->where('id', $id)->first();
            $tags = Tag::all();
            $categories = Category::all();

            return view('admin.post.edit', compact(['post', 'tags', 'categories']));
        }
        return redirect(route('admin.home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required|image|nullable|max:2000',
        ]);

        // Handle File Upload
        if($request->hasFile('image')){
            //Get Filename With The Extension
            $filenameWithExt = $request->file('image')->getClientMimeType();

            //Get Just Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Get Just Ext
            $extension = $request->file('image')->getClientOriginalExtension(); //It's Format Of File

            //Filename To Store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            //Upload Image
            $path = $request->file('image')->storeAs('public/post_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Post
        $post = Post::find($id);
        $post -> title = $request -> title;
        $post -> subtitle = $request -> subtitle;
        $post -> slug = $request -> slug;
        $post -> body = $request -> body;
        $post -> image = $fileNameToStore;
        $post -> tags() -> sync($request -> tags);
        $post -> categories() -> sync($request -> categories);

        //$post -> posted_by = $request -> posted_by;
        //$post -> like = $request -> like;
        //$post -> dislike = $request -> dislike;
        $post -> save();

        return redirect(route('post.index'))->with('success','Post is edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id) -> delete();
        return redirect() -> back() -> with('success','Post is deleted successfully');
    }
}
