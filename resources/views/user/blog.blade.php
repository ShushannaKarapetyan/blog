@extends('user/app')
@section('bg-img', asset('user/img/home-bg.jpg'))
@section('title', 'Interesting Blog')
@section('sub-heading', 'Learn Together and Grow Together')
@section('main-content')
    <!-- Main Content -->
    <div class="container">
        <div class="row" id="app">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-preview">
                    @foreach($posts as $post)
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
    <script>
        token = '{{Session::token()}}'
    </script>
@endsection
