@extends('user/app')
@section('bg-img', asset('user/img/contact-bg.jpg'))
@section('title', 'Welcome To Home '.Auth::user()->name)
@section('main-content')
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                        Welcome
                </div>
            </div>
        </div>
    </article>
    <hr>
@endsection








































