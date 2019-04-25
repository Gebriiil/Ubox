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
        <div class="box-body">
          <table id="productIndex" class="table table-bordered table-hover" style="width: 100%">
            <thead>
              <tr>
                <th>{{__('projectmodule::project.id')}}</th>
                <th>{{__('projectmodule::project.project')}}</th>
                  <th>{{__('projectmodule::project.desc')}}</th>
                  <th>{{__('projectmodule::project.edit')}}</th>
                <th>{{__('projectmodule::project.delete')}}</th>
              </tr>
            </thead>
            <tbody>

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



  <script src="{{asset('../assets/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('../assets/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

  <!-- <script>
      $(document).ready(function () {

          $('#productIndex').DataTable({
              dom: 'lBfrtip',
              buttons: [
                  { extend: 'print', text: 'طباعه',messageBottom:' <strong>جميع الحقوق محفوظة  Makdak .</strong>'},
                  { extend: 'excel', text: ' اكسيل' },
              ] ,
              "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
              "language": {
                  "search" : "  بحث :  ",
                  "paginate": {
                      "previous": "السابق",
                      "next": "التالى"
                  },
                  "info":           "عرض _START_ الي _END_ من _TOTAL_ من الصفوف",
                  "lengthMenu":     "عرض _MENU_ من الصفوف",
                  "loadingRecords": "جاري التحميل...",
                  "processing":     "جاري التحميل...",
                  "zeroRecords":    "لا يوجد نتائج",
                  "infoEmpty":      "عرض 0 to 0 of 0 من الصفوف",
                  "infoFiltered":   "(عرض من _MAX_ صف)",
              } ,
              "processing": true,
              "serverSide": true,
              "ajax": {
                  "url": "{{ url('admin-panel/project/ajax') }}",
                  "type": "GET"
              },
              "columns": [
                  { data: 'id', name: 'id' },
                  { data: 'name', name: 'name' },                  
                  { data: 'desc', name: 'desc' },                  
                  { data: 'edit', name: 'edit', orderable: false, searchable: false},
                  { data: 'delete', name: 'delete', orderable: false, searchable: false},

              ]
          });

      });
  </script> -->





@endsection
