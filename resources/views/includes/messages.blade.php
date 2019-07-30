@if(count($errors) > 0)
    @foreach($errors -> all() as $error)
        <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color: white; opacity: 1; font-weight: 200; margin:15px 10px">&times;</a>
        <p class="alert alert-danger"> {{ $error }} </p>
    @endforeach
@endif

@if(session('success'))
    <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color: white; opacity: 1; font-weight: 200; margin:15px 10px">&times;</a>
    <p class="alert alert-success"> {{session('success')}} </p>
@endif

