<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}">Blog</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Contact</a>
                </li>

                @if(Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('register')}}" class="nav-link">
                            {{ __('Register') }}
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
            @endif

            <!-- Search form -->
                <form action="{{route('search')}}" method="post" role="search" class="form-inline md-form form-sm">
                    {{ csrf_field() }}
                    <div class="search-input-and-button">
                        <input class="form-control form-control-sm w-75" name="post-search" type="text" placeholder="Search"
                               aria-label="Search">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </form>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<header class="masthead" style="background-image: url(@yield('bg-img')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>@yield('title')</h1>
                    <hr class="small">
                    <span class="subheading">@yield('sub-heading')</span>
                </div>
            </div>
        </div>
    </div>
</header>