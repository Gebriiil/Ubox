@extends('commonmodule::layouts.master')

@section('title')
  {{__('jobmodule::job.pagetitle')}}
@endsection

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('assets/admin/bower_components/select2/dist/css/select2.min.css')}}">

{{-- Metro CSS --}}
<link rel="stylesheet" href="{{asset('assets/admin/treeview.css')}}">
@endsection

@section('content-header')
<section class="content-header">
  <h1> {{__('jobmodule::job.pagetitle')}} </h1>

</section>
@endsection

@section('content')
<section class="content">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">{{__('jobmodule::job.pagetitle')}}</h3>
    </div>
    @if (count($errors) > 0)
      @foreach ($errors->all() as $item)
        <p class="alert alert-danger">{{$item}}</p>
      @endforeach
    @endif
    <!-- /.box-header -->
    <form class="form-horizontal" action="{{ route('jobs.store')}}" method="POST" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="box-body">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              @foreach(config('translatable.locales') as $lang)
              <li @if($loop->first) class="active" @endif >
                <a href="#{{ $lang }}" data-toggle="tab">{{ $lang }}</a>
              </li>
              @endforeach

            </ul>

            <div class="tab-content">
              @foreach( config('translatable.locales') as $lang)

              <div class="tab-pane @if($loop->first) active @endif" id="{{ $lang }}">
                <div class="form-group">
                  {{-- title --}}
                  <label class="control-label col-sm-2" for="title">{{__('jobmodule::job.title')}} ({{ $lang }}):</label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" class="form-control"
                      placeholder="Write Title" name="{{$lang}}[title]" required>
                  </div>
                </div>

                <div class="form-group">
                  {{-- Description --}}
                  <label class="control-label col-sm-2" for="title">{{__('jobmodule::job.desc')}} ({{$lang}}):</label>
                  <div class="col-sm-8">
                    <textarea id="editor{{$lang}}" name="{{$lang}}[description]" placeholder="Write Description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>

        {{-- Upload photo --}}
        <div class="form-group">
          
          <label class="control-label col-sm-2" for="photo">{{__('blogmodule::blog.photo')}} :</label>
          <div class="col-sm-4">
            <input data-validation="required" type="file" autocomplete="off" name="image">
          </div>
          
        </div>

        {{-- Insert job Category --}}


        <div class="form-group">
          
          <label class="control-label col-sm-2">{{__('blogmodule::blog.status')}}  : </label>
          <div class="col-sm-3">
            <select class="form-control" name="status" required>
                <option value="active">{{ __('blogmodule::blog.active')  }}</option>
                <option value="notactive">{{ __('blogmodule::blog.notactive')  }}</option>
            </select>
          </div>
        </div>

        
        <div class="form-group">
          
          <label class="control-label col-sm-2">{{__('blogmodule::blog.skills')}}  : </label>
          <div class="col-sm-8">
              <input type="text" name="skills" class="form-control">
          </div>
        </div>
        
        </div>
        <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{url('/admin-panel/job')}}" type="button" class="btn btn-default">{{__('blogmodule::blog.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>

        <button type="submit" class="btn btn-primary pull-right">{{__('blogmodule::blog.submit')}} &nbsp; <i class="fa fa-save"></i></button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
</section>
@endsection

@section('javascript')

  {{-- Treeview --}}
<script  src="{{asset('assets/admin/metro.js')}}" > </script>

<!-- CK Editor -->
<script src="{{asset('assets/admin/bower_components/ckeditor/ckeditor.js')}}"></script>

<!-- Select2 -->
<script src="{{asset('assets/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

<script>
  //Initialize Select2 Elements
  $('.select2').select2();
</script>

@foreach (config('translatable.locales') as $lang)
<script>
  $(function () {
    CKEDITOR.replace('editor' + "{{$lang}}");
  });
</script>
@endforeach

@endsection
