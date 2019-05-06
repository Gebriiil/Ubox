@extends('commonmodule::layouts.master')

@section('title')
  {{__('productmodule::product.pagetitle')}}
@endsection

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('assets/admin/bower_components/select2/dist/css/select2.min.css')}}">

{{-- Metro CSS --}}
<link rel="stylesheet" href="{{asset('assets/admin/treeview.css')}}">
@endsection

@section('content-header')
<section class="content-header">
  <h1> {{__('productmodule::product.pagetitle')}} </h1>

</section>
@endsection

@section('content')
<section class="content">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">{{__('productmodule::product.pagetitle')}}</h3>
    </div>
    @if (count($errors) > 0)
      @foreach ($errors->all() as $item)
        <p class="alert alert-danger">{{$item}}</p>
      @endforeach
    @endif
    <!-- /.box-header -->
    <form class="form-horizontal" action="{{url('/admin-panel/product')}}" method="POST" enctype="multipart/form-data">
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
                  <label class="control-label col-sm-2" for="title">{{__('productmodule::product.title')}} ({{ $lang }}):</label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" class="form-control"
                      placeholder="Write Title" name="{{$lang}}[title]" required>
                  </div>
                </div>

                <div class="form-group">
                  {{-- Description --}}
                  <label class="control-label col-sm-2" for="title">{{__('productmodule::product.desc')}} ({{$lang}}):</label>
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
          <label class="control-label col-sm-2" for="photo">{{__('productmodule::product.photo')}} :</label>
          <div class="col-sm-4">
            <input data-validation="required" type="file" autocomplete="off" name="photo">
          </div>
          <label class="control-label col-sm-2" for="imgs">{{__('productmodule::product.album')}} :</label>
          <div class="col-sm-4">
            <input type="file" multiple="multiple" name="photos[]" />
          </div>
        </div>

        {{-- Insert Product Category --}}


        <div class="form-group">
          <label class="control-label col-sm-2">{{__('productmodule::product.price')}}  : </label>
          <div class="col-sm-3">
            <input type="text" autocomplete="off" class="form-control"  name="sell_price" required>
          </div>

          <label class="control-label col-sm-2">{{__('productmodule::product.status')}}  : </label>
          <div class="col-sm-3">
            <select class="form-control" name="status" required>
                <option value="active">{{ __('productmodule::product.active')  }}</option>
                <option value="notactive">{{ __('productmodule::product.notactive')  }}</option>
            </select>
          </div>
        </div>


        <div class="form-group">
          <div class="box-header">
            <pre><h4>SEO Columns : </h4></pre>
          </div>
        </div>

        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              @foreach(config('translatable.locales') as $lang)
              <li @if($loop->first) class="active" @endif >
                <a href="#seo{{ $lang }}" data-toggle="tab">{{ $lang }}</a>
              </li>
              @endforeach
            </ul>

            <div class="tab-content">
              @foreach(config('translatable.locales') as $lang)
              <div class="tab-pane @if($loop->first) active @endif" id="seo{{ $lang }}">

                <div class="form-group">
                  {{-- Meta Title --}}
                  <label class="control-label col-sm-2" for="title"> {{__('productmodule::product.mt')}}  ({{ $lang }}):</label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" class="form-control" placeholder="Write information about your title" name="{{ $lang}}[meta_title]">
                  </div>

                </div>

                <div class="form-group">
                  {{-- Meta Description --}}
                  <label class="control-label col-sm-2" for="desc"> {{__('productmodule::product.md')}}  ({{ $lang }}):</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" autocomplete="off" placeholder="Write information about your product" name="{{ $lang}}[meta_desc]" cols="15"
                      rows="2"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  {{-- Meta Keywords --}}
                  <label class="control-label col-sm-2" for="tags"> {{__('productmodule::product.tags')}}  ({{ $lang }}):</label>
                  <div class="col-sm-8">
                    <input autocomplete="off" type="text" class="form-control" placeholder="Write information about your product" name="{{ $lang}}[meta_keywords]">
                  </div>
                </div>

                <!-- Slug -->
                <div class="form-group">
                  <label class="control-label col-sm-2" for="slug">Slug : </label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" class="form-control"  name="{{ $lang}}[slug]">
                  </div>
                </div>

              </div>
              @endforeach

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>

        </div>
        <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{url('/admin-panel/product')}}" type="button" class="btn btn-default">{{__('productmodule::product.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>

        <button type="submit" class="btn btn-primary pull-right">{{__('productmodule::product.submit')}} &nbsp; <i class="fa fa-save"></i></button>
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
