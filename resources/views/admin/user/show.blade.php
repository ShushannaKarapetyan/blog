@extends('admin.layouts.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.css') }}">
    <style>
        th,td{
            text-align: center;
        }
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

            <!-- Default box -->
            <div class="box box-primary">
                <div class="box-header with-border">

                    @include('includes.messages')

                    <h3 class="box-title">Users</h3>
                    <a href="{{ route('user.create') }}" class="col-lg-offset-10">
                        <button class="btn btn-success" type="button">Add New</button>
                    </a>
                </div>
                <div class="box-body">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Table With Full Features</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>User Name</th>
                                    <th>Assigned Roles</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $loop -> index + 1 }}</td>
                                        <td>{{ $user -> name }}</td>
                                        <td>
                                            @foreach($user -> roles as $role)
                                                {{ $role -> name }} /
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('user.edit', $user -> id) }}">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                        </td>
                                        <td>
                                            <form id="delete-form-{{ $user->id }}" method="POST" action="{{ route('user.destroy', $user -> id) }}" style="display: none;">

                                                {{ csrf_field() }}

                                                {{ method_field('DELETE') }}

                                            </form>

                                            <a href="" onclick="
                                                    if(confirm('Are you sure, you want to delete this')){
                                                    event.preventDefault(); document.getElementById('delete-form-{{$user -> id}}').submit();}
                                                    else {
                                                    event.preventDefault()
                                                    }">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>S.No</th>
                                    <th>User Name</th>
                                    <th>Assigned Roles</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Footer
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('footerSection')
    {{--<script rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.js') }}"></script>
  --}}
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />

    <script>
        $(function () {
            $('#example1').DataTable();
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            });
        })

        $(document).ready(function(){
            $('.close').click(function(){
                $(this).next().hide();
                $(this).hide();
            });
        });
    </script>
@endsection