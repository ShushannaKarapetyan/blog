@extends('admin.layouts.app')

@section('headSection')
    <link rel="stylesheet" href="{{asset('admin/bower_components/select2/dist/css/select2.min.css')}}">
    <style>
        .box-title{
            font-size: 25px!important;
        }
    </style>
@endsection

@section('main-content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Post</h3>
                        </div>

                    @include('includes.messages')

                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('post.update', $post -> id)}}" method="POST" enctype="multipart/form-data">

                            {{csrf_field()}}

                            {{method_field('PUT')}}

                            <div class="box-body">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="title">Post Title</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $post->title }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="subtitle">Post Sub Title</label>
                                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Sub Title" value="{{ $post->subtitle }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug">Post Slug</label>
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ $post->slug }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="image">File input</label>
                                        <input type="file" name="image" id="post_image" style="width: 120px" accept=".jpg, .jpeg, .png" value="{{ $post -> image }}"><br>
                                        <p>{{$post -> image}}</p>
                                        <img src="{{asset('storage/post_images')}}/{{$post -> image}}" id="post-img-show" width="150px" height="100px">
                                    </div><br>
                                    <div class="form-group">
                                        <label>Select Tags</label>
                                        <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Tag" style="width: 100%;" data-select2-id="7" tabindex="-1" aria-hidden="true" name="tags[]">
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag -> id }}"
                                                        @foreach($post -> tags as $postTag)
                                                        @if($postTag -> id == $tag -> id)
                                                        selected
                                                        @endif
                                                        @endforeach
                                                >{{ $tag -> name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group" style="margin-top: 20px;">
                                        <label>Select Category</label>
                                        <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a Category" style="width: 100%;" data-select2-id="8" tabindex="-1" aria-hidden="true" name="categories[]">
                                            @foreach($categories as $category)
                                                <option value="{{ $category -> id }}"
                                                        @foreach($post -> categories as $postCategory)
                                                        @if($postCategory -> id == $category -> id)
                                                        selected
                                                        @endif
                                                        @endforeach
                                                >{{ $category -> name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Write Post Body Here
                                        <small>Simple and fast</small>
                                    </h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                                title="Collapse">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /. tools -->
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body pad">
                                    <textarea class="textarea" id='post-body-ckeditor' name="body"  placeholder="Place some text here"
                                              style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        {{ $post -> body }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('post.index') }}">
                                    <button type="button" class="btn btn-warning">Back</button>
                                </a>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#post-img-show').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#post_image").change(function(){
            readURL(this);
        });
    </script>
@endsection

@section('footerSection')
    <script src="//cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
    <script src="{{asset('admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('.select2').select2();

            CKEDITOR.replace( 'post-body-ckeditor' );

            $('.close').click(function(){
                $(this).next().hide();
                $(this).hide();
            });

        });

    </script>
@endsection
