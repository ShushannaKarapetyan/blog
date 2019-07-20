<!DOCTYPE html>
<html lang="en">
<head>
    @include('user/layouts/head')
</head>
<body>
<!-- header -->
@include('user/layouts/header')

@yield('main-content')

<!-- Footer -->
@include('user/layouts/footer')
</body>
</html>
