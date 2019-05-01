@extends('commonmodule::layouts.master')

@section('title')
  @lang('blogmodule::blog.edit_blog')
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('../assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
 @endsection

@section('content')
<section class="content">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">{{__('blogmodule::blog.edit_blog')}}</h3>
    </div>
    @if (count($errors) > 0)
      @foreach ($errors->all() as $item)
        <p class="alert alert-danger">{{$item}}</p>
      @endforeach
    @endif
    <!-- /.box-header -->
    <form class="form-horizontal" action="{{url('/admin-panel/blog/' . $blog->id)}}" method="POST" enctype="multipart/form-data">
      {{ method_field('PUT') }}
      {{ csrf_field() }}

      <div class="box-body">
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              @foreach(config('translatable.locales') as $locale)
              <li @if($loop->first) class="active" @endif >
                <a href="#{{ $locale }}" data-toggle="tab">{{ my_lang($locale) }}</a>
              </li>
              @endforeach

            </ul>

            <div class="tab-content">
              @foreach(config('translatable.locales') as $locale)
              <div class="tab-pane @if($loop->first) active @endif" id="{{ $locale }}">
                <div class="form-group">
                  {{-- title --}}
                  <label class="control-label col-sm-2" for="title">{{__('blogmodule::blog.title')}} ({{ my_lang($locale) }}):</label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" class="form-control"
                      placeholder="Write Title" value="{{$blog->translate($locale)->title}}" name="{{ $locale }}[title]" required>
                  </div>
                </div>

                <div class="form-group">
                  {{-- Description --}}
                  <label class="control-label col-sm-2" for="title">{{__('blogmodule::blog.desc')}} ({{ my_lang($locale) }}):</label>
                  <div class="col-sm-8">
                    <textarea id="editor{{$locale}}" name="{{$locale}}[desc]" placeholder="Write Description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$blog->translate($locale)->desc}}</textarea>
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
            <input type="file" multiple="multiple" name="photos[]" />
          </div>
        </div>

        </div>
        <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{url('/admin-panel/blog')}}" type="button" class="btn btn-default">{{__('blogmodule::blog.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>

        <button type="submit" class="btn btn-primary pull-right">{{__('blogmodule::blog.submit')}} &nbsp; <i class="fa fa-save"></i></button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
</section>
@endsection



