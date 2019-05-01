@extends('commonmodule::layouts.master')

@section('title')
    {{__('usermodule::user.pagetitle')}}
@endsection

@section('css')
    <link rel="stylesheet"
          href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content-header')
    <section class="content-header">
        <h1>
            {{__('usermodule::user.pagetitle')}}
        </h1>
    </section>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{__('usermodule::user.pagetitle')}}</h3>
                    {{-- Add New --}}
                    <!-- <a href="{{url('admin-panel/package/create')}}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; {{__('usermodule::user.addnew')}}</a> -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="packageIndex" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{__('usermodule::user.id')}}</th>
                                <th>{{__('usermodule::user.name')}}</th>
                                <th>{{__('usermodule::user.last_name')}}</th>
                                <th>{{__('usermodule::user.phone')}}</th>
                                <th>{{__('usermodule::user.gender')}}</th>
                                <th>{{__('usermodule::user.parent')}}</th>
                                <th>{{__('usermodule::user.operation')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $item)
                                <tr>
                                    <td> {{$item->id}} </td>

                                    <td> {{$item->name}} </td>
                                    <td> {{$item->rank}} </td>
                                    <td> {{$item->phone}} </td>
                                    <td> {{$item->gender}} </td>
                                    <td>
                                        @if($item->parent_id) {{$item->parent->name}}
                                        @else {{''}}
                                        @endif
                                    </td>
                                    <td>
                                        <a title="View" href="{{url('/admin-panel/user/' . $item->id)}}" type="button"
                                           class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('javascript')


    @include('commonmodule::includes.swal')

    <!-- DataTables -->
    <script src="{{asset('assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#userIndex').DataTable({
                'paging': true,
                'lengthChange': true,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': false
            });
        })

    </script>

@endsection
