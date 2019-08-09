@extends('admin.layouts.app')
@section('main-content')
    <style>
        .box-title{
            font-size: 25px!important;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Roles</h3>
                        </div>

                    @include('includes.messages')

                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('role.update', $role -> id)}}" method="POST">

                            {{ csrf_field() }}

                            {{ method_field('PUT') }}

                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Role Title</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Role" value="{{ $role -> name }}">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label>Posts Permissions</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'Post')
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="permission[]" value="{{$permission -> id}}"
                                                                @foreach($role -> permissions as $role_permission)
                                                                      @if($role_permission -> id == $permission -> id)
                                                                          checked
                                                                      @endif
                                                                @endforeach
                                                            >{{$permission -> name}}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-lg-4">
                                            <label>User Permissions</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'User')
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="permission[]" value="{{$permission -> id}}"
                                                                   @foreach($role -> permissions as $role_permission)
                                                                       @if($role_permission -> id == $permission -> id)
                                                                            checked
                                                                        @endif
                                                                   @endforeach
                                                            >{{$permission -> name}}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Other Permissions</label>
                                            @foreach($permissions as $permission)
                                                @if($permission->for == 'Other')
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="permission[]" value="{{$permission -> id}}"
                                                                   @foreach($role -> permissions as $role_permission)
                                                                       @if($role_permission -> id == $permission -> id)
                                                                            checked
                                                                       @endif
                                                                   @endforeach
                                                            >{{$permission -> name}}
                                                        </label>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('role.index', $role->id) }}">
                                            <button type="button" class="btn btn-warning">Back</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            $('.close').click(function(){
                $(this).next().hide();
                $(this).hide();
            });
        });
    </script>
@endsection