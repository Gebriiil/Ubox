@extends('commonmodule::layouts.master')

@section('title')
  {{__('usermodule::user.pagetitle')}}
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
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
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive " src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTAcY_E2yWmwJ28wCwSUMWypzrdbN3q-dD9hXVYBo676FF_l21" alt="User profile picture">

                        <h3 class="profile-username text-center">{{$user->name}}</h3>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>{{__('usermodule::user.mail')}}</b> <a class="pull-right">{{$user->email}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{__('usermodule::user.phone')}}</b> <a class="pull-right">{{$user->phone}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{__('usermodule::user.created_at')}}</b> <a class="pull-right">{{$user->created_at->format('d/m/Y')}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{__('usermodule::user.wallet')}}</b> <a class="pull-right">{{$user->wallet}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>{{__('usermodule::user.wallet_expired')}}</b> <a class="pull-right">{{\Carbon\Carbon::parse($user->wallet_expired_at)->format('Y-m-d')}}</a>
                            </li>
                        </ul>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">More Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i>Gender</strong>

                        <p class="text-muted">
                            {{$user->gender}}
                        </p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> Birth Date</strong>
                        <p>
                        {{$user->birth_date}}
                        </p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> City</strong>

                        <p>{{$user->city}}</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="@if (!$errors->any()) active @endif tab-pane"><a href="#bookings" data-toggle="tab">{{__('usermodule::user.packages')}}</a></li>
                        <li class="@if ($errors->any()) active @endif "><a href="#wallet" data-toggle="tab">{{__('usermodule::user.wallet')}}</a></li>

                    </ul>
                    <div class="tab-content">
                        <!-- /.tab-pane -->
                        <div class="@if (!$errors->any()) active @endif tab-pane" id="bookings">
                            <!-- The timeline -->
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">{{__('usermodule::user.packages')}}</h3>
                                            
                                            </div>
                                        </div>

                                        <!-- /.box-header -->
                                        <div class="box-body table-responsive no-padding">
                                            <table class="table table-hover">
                                                <tr>
                                                    <th>{{__('usermodule::user.id')}}</th>
                                                    <th>{{__('usermodule::user.title')}}</th>
                                                    <th>{{__('usermodule::user.ship_price')}}</th>
                                                    <th>{{__('usermodule::user.tax')}}</th>
                                                    <th>{{__('usermodule::user.discount')}}</th>
                                                    <th>{{__('usermodule::user.products')}}</th>
                                                </tr>
                                                @foreach($user->packages as $package)
                                                    <tr>
                                                        <td>{{$package->id}}</td>
                                                        <td>{{$package->title}}</td>
                                                        <td>{{$package->ship_price}}</td>
                                                        <td>{{$package->tax}}</td>
                                                        <td>{{$package->discount}}</td>
                                                        <td>
                                                          @foreach($package['products'] as $product)
                                                            <ul> 
                                                              <li> {{$product->title}} </li>
                                                            </ul>
                                                          @endforeach
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                        <!-- /.box-body -->
                                      
                                    </div>
                                    <!-- /.box -->
                                </div>
                            </div>
                        <div class="@if ($errors->any()) active @endif tab-pane" id="wallet">
                            <!-- The timeline -->
                            <div class="row">
                                <div class="col-sm-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form class="form-horizontal" action="{{url('/admin-panel/user-transaction/deposit/'.$user->id)}}" method="POST" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="box-body">
                                            <div class="form-group">
                                                <label class="control-label col-sm-2" for="code">{{__('usermodule::user.deposit')}} :</label>
                                                <div class="col-sm-7">
                                                    <input data-validation="required" type="number" id="code"  class="col-sm-6 form-control"   autocomplete="off" name="value">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                        <div class="box-footer">
                                            <button type="submit" class="btn btn-primary pull-right">{{__('usermodule::user.submit')}} &nbsp; <i class="fa fa-save"></i></button>
                                        </div>
                                        <!-- /.box-footer -->
                                    </form>
                                </div>

                                <div class="col-xs-12">
                                    <div class="box box-primary">
                                        <div class="box-header">
                                            <h3 class="box-title">{{__('usermodule::user.wallet')}}</h3>
                                        </div>
                                    </div>

                                    <!-- /.box-header -->
                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-hover">
                                            <tr>
                                                <th>{{__('usermodule::user.transaction-status')}}</th>
                                                <th>{{__('usermodule::user.transaction-value')}}</th>
                                                <th>{{__('usermodule::user.date')}}</th>
                                            </tr>
                                            @foreach($user->transactions as $trans)
                                                <tr>
                                                    <td>{{__('usermodule::user.'.$trans->status)}}</td>
                                                    <td>{{$trans->value}}</td>
                                                    <td>{{$trans->created_at}}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                    <!-- /.box-body -->

                                </div>
                                <!-- /.box -->
                            </div>
                        </div>

                    </div>


                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->

        </div>

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
