@extends('commonmodule::layouts.master')

@section('title')
  {{__('trainingmodule::training.categories')}}
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('../assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
 @endsection

@section('content-header')
  <section class="content-header">
    <h1>
      {{__('trainingmodule::training.categories')}}
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
          <h3 class="box-title">{{__('trainingmodule::training.categories')}}</h3>
          {{-- Add New --}}
          <a href="{{url('admin-panel/training-category/create')}}" type="button" class="btn btn-success pull-right">
              <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; {{ trans('adminmodule::admin.add_new') }}</a>
        </div>
        <!-- /.box-header -->
        <div class="box-header">
              <h3 class="box-title">{{__('trainingmodule::training.categories')}}</h3>
        </div>

          <div class="box-body">
              <table id="adminsTable" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                      <th>{{ trans('blogmodule::blog.id') }}</th>
                      <th>{{ trans('blogmodule::blog.title') }}</th>
                      <th>{{ trans('blogmodule::blog.desc') }}</th>
                      <th>{{ trans('blogmodule::blog.image') }}</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($categories as $category)
                      <tr>
                          <td> {{$category->id}} </td>

                          <td> {{$category->name}} </td>

                          <td> {{$category->desc}} </td>
                          <td> <img src="{{asset('upload/' . $category->image)}}" style="width: 100px;height: 65px;"> </td>

                          <td>
                              {{-- Edit --}}
                              <a title="Edit" href="{{aurl('training-category/' . $category->id . '/edit')}}" type="button" class="btn btn-primary">
                                  <i class="fa fa-pencil" aria-hidden="true"></i>
                              </a>
                              {{-- Delete --}}
                              <form class="inline" action="{{aurl('training-category/' . $category->id)}}" method="POST">
                                  {{ method_field('DELETE') }} {!! csrf_field() !!}
                                  <button title="Delete" type="submit" onclick="return confirm('{{trans("blogmodule::blog.delete_confirm")}}')" type="button"
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


          <!-- /.box -->
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



  @push('js')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.5.1/css/colReorder.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.min.css">
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/colreorder/1.5.1/js/dataTables.colReorder.min.js"></script>

@endpush

  





@endsection
