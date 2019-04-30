@extends('commonmodule::layouts.master')

@section('title')
  {{__('trainingmodule::training.pagetitle')}}
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('../assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
 @endsection

@section('content-header')
  <section class="content-header">
    <h1>
      {{__('trainingmodule::training.pagetitle')}}
    </h1>
  </section>
@endsection

@section('content')

<div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $title }}</h3>

                <a href="{{url('admin-panel/training/create')}}" type="button" class="btn btn-success pull-right">
                    <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; {{ trans('adminmodule::admin.add_new') }}
                </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
            <!-- /.box-body -->
      {!! $dataTable->table([
        'class'=>'dataTable table table-bordered table-hover'
        ]) !!}
          </div>
          <!-- /.box -->
    </div>

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







