@extends('user/app')
@section('bg-img', asset('user/img/post-bg.jpg'))
@section('title', $post -> title)
@section('sub-heading', $post -> subtitle)
@section('main-content')
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="row">
                        <small class="pull-left">Created at {{$post->created_at->diffForHumans()}}</small>
                        @foreach($post->categories as $category)
                            <small class="pull-right" style="margin-left:300px">
                                {{$category -> name}}
                            </small>
                        @endforeach
                        {!! $post -> body !!}
                        <h2>Tags</h2>
                            @foreach($post->tags as $tag)
                                <div class="pull-right" style="margin-right: 20px; border-radius:5px;border: 1px solid gray; padding: 5px">
                                    {{$tag -> name}}
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </article>
    <hr>
@endsection