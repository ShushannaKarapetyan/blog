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
                            <h2 class="box-title">Add Admin</h2>
                        </div>

                    @include('includes.messages')

                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('user.store')}}" method="POST">

                            {{ csrf_field() }}

                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">User Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="User Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-password">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <div class="row">
                                            <label for="">Assign Role</label>
                                            <div class="row">
                                                @foreach($roles as $role)
                                                    <div class="col-lg-3">
                                                        <div class="checkbox">
                                                            <label for="">
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