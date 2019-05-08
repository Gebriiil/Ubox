@extends('commonmodule::layouts.master')

@section('title')
 {{ trans('jobmodule::job.jobs') }}
@endsection


@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ trans('jobmodule::job.jobs') }}</h3>
                        {{-- Add New--}}
                        <a href="{{url('admin-panel/jobs/create')}}" type="button" class="btn btn-success pull-right">
                            <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; {{ trans('commonmodule::sidebar.add_new') }}
                        </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="jobsTable" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>{{ trans('jobmodule::job.title') }}</th>
                                <th>{{ trans('jobmodule::job.image') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td> {{$job->id}} </td>

                                    <td> {{$job->title}} </td>

                                    <td> <img src="{{ asset('upload/' . $job->image)}}" width="100px" height="100px"> </td>

                                    <td>
                                        {{-- Edit --}}
                                        <a title="Edit" href="{{url('admin-panel/jobs/' . $job->id . '/edit')}}" type="button" class="btn btn-primary">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                        {{-- Delete --}}
                                        <form class="inline" action="{{url('admin-panel/jobs/' . $job->id)}}" method="POST">
                                            {{ method_field('DELETE') }} {!! csrf_field() !!}
                                            <button title="Delete" type="submit" onclick="return confirm('Are you sure, You want to delete job Data?')" type="button"
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