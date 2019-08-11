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
                            <h3 class="box-title">Update Permission</h3>
                        </div>

                    @include('includes.messages')

                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('permission.update', $permission -> id)}}" method="POST">

                            {{ csrf_field() }}

                            {{ method_field('PUT') }}

                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Permission Title</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Permission" value="{{ $permission -> name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="for">Permission for</label>
                                        <select name="for" id="for" class="form-control">
                                            <option value="User">User</option>
                                            <option value="Post">Post</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('permission.index', $permission->id) }}">
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