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
                            <h3 class="box-title">Update Category</h3>
                        </div>

                    @include('includes.messages')

                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form"  action="{{ route('category.update', $category -> id) }}" method="POST">

                            {{csrf_field()}}

                            {{method_field('PUT')}}

                            <div class="box-body">
                                <div class="col-lg-offset-3 col-lg-6">
                                    <div class="form-group">
                                        <label for="name">Category Title</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Category Title" value="{{$category -> name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Category Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{$category -> slug}}">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('category.index') }}">
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
