@extends('user/app')
@section('bg-img', asset('user/img/photo-1499750310107-5fef28a66643.jpg'))
@section('title', 'Interesting Blog')
@section('sub-heading', 'About Everything In One Blog')
@section('main-content')
    <!-- Main Content -->
    <div class="container">
        <div class="row" id="app">
            <div class="col-lg-10 col-md-10 mx-auto">
                <div class="post-preview">
                    @foreach($posts as $post)
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
                        </div><br>

                    @endforeach
                </div>

                <hr>
                <!-- Pager -->
                <div class="pager">
                        {{$posts -> links()}}
                </div>
            </div>
        </div>
    </div>
    <hr>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{asset('user/js/like-dislike.js')}}"></script>
@endsection
