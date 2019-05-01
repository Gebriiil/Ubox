@extends('commonmodule::layouts.master')

@section('title')
  {{__('projectmodule::project.projects')}}
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('../assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
 @endsection

@section('content-header')
  <section class="content-header">
    <h1>
      {{__('projectmodule::project.projects')}}
    </h1>
  </section>
@endsection

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('projectmodule::project.projects') }}</h3>
                        {{-- Add New--}}
                        <a href="{{aurl('project/create')}}" type="button" class="btn btn-success pull-right">
                            <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; {{ trans('projectmodule::project.add_new') }}
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="adminsTable" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{ trans('projectmodule::project.id') }}</th>
                                <th>{{ trans('projectmodule::project.title') }}</th>
                                <th>{{ trans('projectmodule::project.desc') }}</th>
                                <th>{{ trans('projectmodule::project.op') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td> {{$project->id}} </td>

                                    <td> {{$project->title}} </td>

                                    <td> {{$project->desc}} </td>
                                    <td> <img src="{{asset('upload/' . $project->image)}}" style="width: 100px;height: 65px;"> </td>

                                    <td>
                                        {{-- Edit --}}
                                        <a title="Edit" href="{{aurl('project/' . $project->id . '/edit')}}" type="button" class="btn btn-primary">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        {{-- Delete --}}
                                        <form class="inline" action="{{aurl('project/' . $project->id)}}" method="POST">
                                            {{ method_field('DELETE') }} {!! csrf_field() !!}
                                            <button title="Delete" type="submit" onclick="return confirm('{{trans("projectmodule::project.delete_confirm")}}')" type="button"
                                                    class="btn btn-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
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

@section('javascript') {{-- sweet alert --}}

  @include('commonmodule::includes.swal')

  <!-- DataTables -->
  <script src="{{asset('assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

  <script>
      $(document).ready(function () {
          $('#adminsTable').DataTable({
              'paging'      : true,
              'lengthChange': true,
              'searching'   : true,
              'ordering'    : true,
              'info'        : true,
              'autoWidth'   : false
          });
      })

  </script>
@endsection







