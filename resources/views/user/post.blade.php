@extends('user/app')
@section('bg-img', asset(Storage::disk('local')->url('post_images/'.$post->image)))
@section('title', $post -> title)
@section('sub-heading', $post -> subtitle)
@section('main-content')

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v4.0&appId=727519667685336&autoLogAppEvents=1"></script>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="row">
                        <div class="pull-left">Created at {{$post->created_at->diffForHumans()}}</div>

                        @foreach($post->categories as $category)
                            <a href="{{route('category',$category->slug)}}">
                                <div class="pull-right" style="margin-left:30px">
                                    {{$category -> name}}
                                </div>
                            </a>
                        @endforeach
                        <br>

                        {!! $post -> body !!}

                        <h2>Do You Like This Post ?</h2>
                        @if(Auth::user())

                            <a href="{{route('like', $post->id)}}" class="like">
                                <input type="hidden" name="islike" value="like" data-postid="{{ $post->id }}" id="{{$post->id}}" class="post-like">
                                <small class="like-this-post">{{Session::get('like_text')}}</small>&nbsp;
                                <small>{{ $likeCount }}</small>
                                <i class="fas fa-thumbs-up"></i>
                            </a> &nbsp;
                            <a href="{{route('dislike', $post->id)}}" class="like">
                                <input type="hidden" name="isdislike" value="dislike" id="{{$post->id}}" class="post-dislike">
                                <small>{{ $dislikeCount }}</small>&nbsp;
                                <i class="fas fa-thumbs-down"></i>
                                <small>{{Session::get('dislike_text')}}</small>&nbsp;
                            </a>
                        @else
                            <small>Like</small>&nbsp;
                            <small>{{ $likeCount }}</small>&nbsp;
                            <small>Dislike</small>&nbsp;
                            <small>{{ $dislikeCount }}</small>&nbsp;
                        @endif
                        <br><br>

                        <h2>Tags</h2>

                        @foreach($post->tags as $tag)
                            <a href="{{route('tag',$tag->slug)}}">
                                <div class="pull-right" style="margin-right: 20px; border-radius:5px;border: 1px solid gray; padding: 5px">
                                    {{$tag -> name}}
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5"></div>

                </div>
            </div>
        </div>
    </article>
    <hr>
@endsection