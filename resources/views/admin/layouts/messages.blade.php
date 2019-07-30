
@if(count($errors) > 0)
    @foreach($errors -> all() as $error)
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p class="alert alert-danger">{{$error}}</p>
    @endforeach
@endif