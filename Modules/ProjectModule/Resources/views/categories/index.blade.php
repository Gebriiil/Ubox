@extends('commonmodule::layouts.master')

@section('title')
  {{__('projectmodule::project.pagetitle')}}
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('../assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
 @endsection

@section('content-header')
  <section class="content-header">
    <h1>
      {{__('projectmodule::project.pagetitle')}}
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
          <h3 class="box-title">{{__('projectmodule::project.pagetitle')}}</h3>
          {{-- Add New --}}
          <a href="{{url('admin-panel/product/create')}}" type="button" class="btn btn-success pull-right"><i class="fa fa-plus" aria-hidden="true"></i> &nbsp; {{__('projectmodule::project.addnew')}}</a>
        </div>
        <!-- /.box-header -->
        <div class="box-header">
              <h3 class="box-title">{{__('projectmodule::project.pagetitle')}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
            <!-- /.box-body -->
      {!! $dataTable->table([
        'class'=>'dataTable table table-bordered table-hover'
        ]) !!}
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

{!! $dataTable->scripts() !!}
@endpush

  





@endsection
