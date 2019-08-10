@extends('admin.layouts.app')
@section('main-content')
    <style>
        .box-title {
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
                            <h2 class="box-title">Update Admin</h2>
                        </div>

                    @include('includes.messages')

                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('user.update', $user -> id)}}" method="POST">

                            {{ csrf_field() }}

                            {{ method_field('PUT') }}

                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">User Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="User Name" value="{{ $user -> name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user -> email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ $user -> phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="{{ $user -> password }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" value="{{$user -> password}}">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="">Assign Role</label>
                                            <div class="row">
                                                @foreach($roles as $role)
                                                    <div class="col-lg-3">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="role[]" value="{{$role -> id}}">{{$role -> name}}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('user.index') }}">
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
@endsection
@section('footerSection')
    <script>
        $(document).ready(function(){

            $('.close').click(function(){
                $(this).next().hide();
                $(this).hide();
            });

            $('#phone').keyup(function () {
                this.value = this.value.replace(/[^0-9]/g,'');
            });
        });
    </script>
@endsection