@extends('commonmodule::layouts.master')

@section('title')
  @lang('trainingmodule::training.pagetitle')
@endsection

@section('css')
  <link rel="stylesheet" href="{{ asset('../assets/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
 @endsection

@section('content')
<section class="content">
  <!-- Horizontal Form -->
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">{{__('trainingmodule::training.pagetitle')}}</h3>
    </div>
    @if (count($errors) > 0)
      @foreach ($errors->all() as $item)
        <p class="alert alert-danger">{{$item}}</p>
      @endforeach
    @endif
    <!-- /.box-header -->
    <form class="form-horizontal" action="{{url('/admin-panel/training')}}" method="POST" enctype="multipart/form-data">
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
                  <label class="control-label col-sm-2" for="title">{{__('trainingmodule::training.title')}} ({{ my_lang($locale) }}):</label>
                  <div class="col-sm-8">
                    <input type="text" autocomplete="off" class="form-control"
                      placeholder="Write Title" name="{{ $locale }}[name]" required>
                  </div>
                </div>

                <div class="form-group">
                  {{-- Description --}}
                  <label class="control-label col-sm-2" for="title">{{__('trainingmodule::training.desc')}} ({{ my_lang($locale) }}):</label>
                  <div class="col-sm-8">
                    <textarea id="editor{{$locale}}" name="{{$locale}}[desc]" placeholder="Write Description" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                  </div>
                </div>
                {{-- Insert Product Category --}}
                <div class="form-group" style="margin-left: 10px; margin-right: 5px;">
                          <label>Select</label>
                          <select class="form-control" name="training_cat_id" >
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->translate($locale)->name}}</option>
                            @endforeach
                          </select>
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
          <label class="control-label  col-sm-2" for="start_at">{{__('trainingmodule::training.start_at')}} :</label>
          <div class="col-sm-4">
            <input data-validation="required" type="date" autocomplete="off" name="start_at">
          </div>
        </div>


        {{-- Upload photo --}}
        <div class="form-group">
          <label class="control-label col-sm-2" for="end_at">{{__('trainingmodule::training.end_at')}} :</label>
          <div class="col-sm-4">
            <input data-validation="required" type="date" autocomplete="off" name="end_at">
          </div>
        </div>

        {{-- Upload photo --}}
        <div class="form-group">
          <label class="control-label col-sm-2" for="photo">{{__('trainingmodule::training.photo')}} :</label>
          <div class="col-sm-4">
            <input data-validation="required" type="file" autocomplete="off" name="image">
          </div>
        </div>

        </div>
        <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{url('/admin-panel/training')}}" type="button" class="btn btn-default">{{__('trainingmodule::training.cancel')}} &nbsp; <i class="fa fa-remove" aria-hidden="true"></i> </a>

        <button type="submit" class="btn btn-primary pull-right">{{__('trainingmodule::training.submit')}} &nbsp; <i class="fa fa-save"></i></button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
</section>
@endsection



