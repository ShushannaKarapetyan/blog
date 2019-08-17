@extends('user/app')
@section('bg-img', asset('user/img/home-bg.jpg'))
@section('title', 'Interesting Blog')
@section('sub-heading', 'Learn Together and Grow Together')
@section('main-content')
    <!-- Main Content -->
    <div class="container">
        <div class="row" id="app">
            <div class="col-lg-10 col-md-10 mx-auto">
                <div class="post-preview">
                    <p>Search "{{$search_post}}"</p>
                    <h3>Have been found these posts </h3><br>
                    @foreach($search_posts as $post)
                        <div class="row">
                            <div class="col-lg-8 col-md-8 mx-auto">
                                <a href="{{route('post', $post->slug)}}">
                                    <h2 class="post-title">
                                        {{$post->title}}
                                    </h2>
                                    <h3 class="post-subtitle">
                                        {{$post->subtitle}}
                                    </h3>
                                </a>
                                <p class="post-meta">Posted by
                                    <strong>Shushanna</strong>

                                    {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}<br>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <img src="{{asset('storage/post_images/'.$post->image)}}" class="img-thumbnail"  alt="">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <hr>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{asset('user/js/like-dislike.js')}}"></script>
@endsection
