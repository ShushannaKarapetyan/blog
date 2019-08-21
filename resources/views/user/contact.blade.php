@extends('user/app')
@section('bg-img', asset('user/img/contact.jpg'))
@section('title', 'Contact Us')
@section('main-content')
    <style>
        .close{
            position: absolute;
            right: 20px;
            z-index: 1000;
        }
        p.alert{
            margin-bottom: 20px;
            margin-top: 0;
        }

    </style>
    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="contact-text">
                        <p>You can contact us at <span style="color: #2ccc70;">admin@gmail.com</span> if you have questions or would like to guest blog here on our website.
                            You can also leave comments or suggestions for which topic on writing you would like us to write about.
                            When sending an email please mark in the subject line whom you are contacting directly for either comments or topic request.<br><br>
                            Note that with the contact us it can take a week to respond as there is only one person who checks the emails.<br><br>
                            We are also on Twitter and Pintrest  follow us on any of these, and we can chat online.<br><br>
                            We love writing and blogging, but the greatest part is hearing from our readers!  We have a Privacy Policy on our website as well should you have more questions about who and why we do what we do.
                        </p>
                    </div><br>
                    @if(!Auth::user())
                        <p style="color: red">* You needed to  Register for Sending Message</p>
                        <a href="{{route('register')}}">
                            <p>Register Now ?</p>
                        </a>
                        @else

                        @include('includes.messages')

                        <form action="{{route('send')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="message" class="col-md-2 col-form-label text-md-right">{{ __('Message') }}</label>
                                <div class="col-md-10">
                                    <textarea id="message" class="form-control" name="message" autofocus></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-2">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </article>
    <hr>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('.close').click(function(){
                $(this).next().hide();
                $(this).hide();
            });
        });
    </script>
@endsection
