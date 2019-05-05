@extends('uboxfrontmodule::layouts.master')

@section('content')

	<!-- Start Header -->
<div class="fables-header fables-after-overlay bg-rules">
    <div class="container"> 
         <h2 class="fables-page-title fables-second-border-color text-rtl">@lang('uboxfrontmodule::front.timeline')</h2>
    </div>
</div>  
<!-- /End Header -->
     
<!-- Start Breadcrumbs -->
<div class="fables-light-background-color">
    <div class="container"> 
        <nav aria-label="breadcrumb">
          <ol class="fables-breadcrumb breadcrumb px-0 py-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="fables-second-text-color">@lang('uboxfrontmodule::front.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('commonmodule::sidebar.blog')</li>
          </ol>
        </nav> 
    </div>
</div>
<!-- /End Breadcrumbs -->
     
<!-- Start page content --> 
<div class="container  fables-counter">   
    <div id="cd-timeline" class="blog-timeline">
    @foreach($blogs as $blog)
       <span class="fables-second-background-color line"></span>
        <div class="cd-timeline-block"> 
           <div class="cd-timeline-img fables-second-background-color"></div>   
           <span class="cd-date fables-light-background-color fables-fifth-text-color">{{$blog->created_at}}</span>
            <div class="cd-timeline-content mb-4"> 
              <div class="row dir-right">
                  <div class="col-12 col-lg-5">
                      <div class="image-container translate-effect-right">
                          <a href="#"><img src="{{asset('upload/' . $blog->image1)}}" alt="" style="height: 250px;"></a>
                      </div>
                      
                  </div>
                  <div class="col-12 col-lg-7 mt-3 mt-lg-0">

                      <h2 class="font-22 semi-font mb-2"><a href="blogdetails.html" class="fables-main-text-color fables-second-hover-color">{{$blog->title}}</a></h2> 
                      <p class="fables-forth-text-color mb-2">
                      		{{substr($blog->desc,0,200)}}
                          
                      		
                      </p>
                      <a href="{{ route('only_new' , $blog->id) }}" class="btn fables-main-text-color fables-second-hover-color p-0 underline mt-2 fl-right">@lang('uboxfrontmodule::front.read_more')</a>
                    </div>
              </div> 
            </div>   
        </div> 
    @endforeach  

   </div>

   <!-- <div class="text-center my-5">
        <a href="blogdetails.html" class="btn fables-second-background-color white-color fables-main-hover-background-color px-5 py-2 white-color-hover">Load More</a>
   </div> --> 
</div>
<!-- /End page content -->

@endsection
