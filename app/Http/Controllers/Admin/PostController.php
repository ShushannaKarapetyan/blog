<?php

namespace App\Http\Controllers\Admin;

use App\Model\user\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
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
        return view('admin.post.post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
        ]);

        $post = new Post();
        $post -> title = $request -> title;
        $post -> subtitle = $request -> subtitle;
        $post -> slug = $request -> slug;
        $post -> body = $request -> body;
        $post -> image = $request -> image;
        $post -> status = $request -> status;
        //$post -> posted_by = $request -> posted_by;
        //$post -> like = $request -> like;
        //$post -> dislike = $request -> dislike;
        $post -> save();

        return redirect(route('post.index'));

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
        $post = Post::where('id', $id)->first();
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
        ]);


        $post = Post::find($id);
        $post -> title = $request -> title;
        $post -> subtitle = $request -> subtitle;
        $post -> slug = $request -> slug;
        $post -> body = $request -> body;
        $post -> image = $request -> image;
        $post -> status = $request -> status;
        //$post -> posted_by = $request -> posted_by;
        //$post -> like = $request -> like;
        //$post -> dislike = $request -> dislike;
        $post -> save();

        return redirect(route('post.index'));
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
        return redirect() -> back();
    }
}
