@extends('uboxfrontmodule::layouts.master')

@section('content')


<div class="fables-light-background-color">
    <div class="container"> 
        <nav aria-label="breadcrumb">
          <ol class="fables-breadcrumb breadcrumb px-0 py-3">
            <li class="breadcrumb-item"><a href="index.html" class="fables-second-text-color">@lang('uboxfrontmodule::front.home')</a></li>
			   <li class="breadcrumb-item"><a href="blog.html" class="fables-second-text-color">@lang('commonmodule::sidebar.blog')</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $new->title }}</li>
          </ol>
        </nav> 
    </div>
</div>

    <div class="container dir-right fables-counter">
        <div class="row my-4 my-lg-5">
             <div class="col-12 col-lg-8">  
                         <div class="owl-carousel owl-theme default-carousel nav-0 blog-single-slider fables-second-dots dir-left"> 
                             <div>
                                 <a href="#">
                                   <img src="{{ asset('upload/' . $new->image1) }}" alt="" class="w-100">
                                 </a>
                             </div>
                             <div>
                                 <a href="#">
                                   <img src="{{ asset('upload/' . $new->image2) }}" alt="" class="w-100">
                                 </a>
                             </div>
                             <div>
                                 <a href="#">
                                   <img src="{{ asset('upload/' . $new->image3) }}" alt="" class="w-100">
                                 </a>
                             </div>   
                         </div>
                         <h2 class="font-23 semi-font my-3 text-rtl" style="{{ lang() == 'en' ? 'text-align: left' : '' }}"><a href="#" class="fables-main-text-color fables-second-hover-color">{{ $new->title }}</a></h2>
                 <div class="fables-forth-text-color fables-blog-date">                                  
                     <div class="row">
                         <div class="col-12 col-sm-10 pt-2 text-rtl" style="{{ lang() == 'en' ? 'text-align: left' : '' }}"  >
                                 <span class="fables-icondata fables-second-text-color mr-1"></span> 
                                 <span class="mr-3"> {{ $new->created_at->diffForHumans() }} </span>
                         </div> 
                     </div>

                 </div>
                 <p class="fables-forth-text-color font-14 my-3 text-rtl" style="{{ lang() == 'en' ? 'text-align: left' : '' }}">
                     {{ $new->desc }}
                 </p>
                 
                 
                 <hr>
                 <div class="row text-rtl">
                     <div class="col-2">
                         <img src="{{ assets('assets/front/custom/images/avatar.jpg') }}" alt="" class="img-fluid">
                     </div>
                     <div class="col-10">
                         <p>
                             <span class="fables-fifth-text-color font-14">@lang('uboxfrontmodule::front.posted_by_admin')</span>
                         </p>
                     </div>
                 </div>


                 <div class="fables-comments" style="{{ lang() == 'en' ? 'text-align:left' : '' }}">
                    <h2 class="fables-main-text-color fables-light-background-color my-3 my-lg-4 font-15 bold-font py-3 px-4">@lang('uboxfrontmodule::front.comments')</h2>
                    
                    @forelse($comments as $comment)
                        
                        <div class="fables-comments">
                            <p>
                                <span class="fables-fifth-text-color font-14 fl-right">@lang('uboxfrontmodule::front.posted_by') </span>
                                <a href="" class="fables-forth-text-color fables-second-hover-color font-15 bold-font ml-1 fl-right">{{ $comment->name }}</a>
                                <span class="fables-forth-text-color float-right font-14 fl-left">{{ $comment->created_at->diffForHumans() }}</span>
                            </p>
                            <p class="font-14 fables-fifth-text-color">
                                    {{ $comment->comment }}  
                            </p>
                        </div>

                        <hr>
                    @empty
                    
                        <div class="text-danger text-center"> @lang('uboxfrontmodule::front.is_empty') </div>

                    @endforelse

                    
                </div>    

             <div class="fables-blog-form">
                 <h2 class="fables-main-text-color fables-light-background-color my-3 my-lg-4 font-15 bold-font py-3 px-4">@lang('uboxfrontmodule::front.leave_comment') ...</h2>
                 <form action="{{ route('comment' , $new->id) }}" method="POST" class="fables-contact-form mb-0">
                 <div class="form-row">
                     <div class="form-group col-md-6">
                         <input type="text" class="form-control form-control rounded-0 p-3" name="name" placeholder="@lang('uboxfrontmodule::front.name')">   
                     </div>
                     <div class="form-group col-md-6">
                         <input type="email" class="form-control form-control rounded-0 p-3" name="email" placeholder="@lang('uboxfrontmodule::front.email')"> 
                     </div>
                 </div>                            
                 <div class="form-row"> 
                      <div class="form-group col-md-12">
                          <textarea class="form-control form-control rounded-0 p-3" name="comment" placeholder="@lang('uboxfrontmodule::front.comment')" rows="4"></textarea>
                     </div> 
                 </div>

                 <input type="hidden" name="blog_id"="{{ $new->id }}">

                 <div class="form-row">
                   <div class="form-group col-md-12">
                       <button type="submit" class="btn fables-second-background-color rounded-0 text-white font-15 px-4 py-2">@lang('uboxfrontmodule::front.post_comment')</button>
                   </div>
                 </div>
               </form>
             </div>
       </div>              
       <div class="col-12 col-lg-4">
         <div class="fables-blog-search">
             <form>
                 <div class="row">
                    <div class="col-12 col-sm-9 col-md-8 mb-3 mb-md-0">
                        <div class="input-icon">
                            <span class="fables-iconsearch-icon fables-input-icon font-14"></span>
                            <input type="text" class="form-control rounded-0 py-2 width-100">
                        </div>
                    </div>
                    <div class="col-12 col-sm-3 col-md-4 pl-md-0">
                        <button type="submit" class="btn fables-second-background-color rounded-0 text-white font-15 semi-font py-2 btn-block">@lang('uboxfrontmodule::front.search')</button>
                    </div>
                 </div> 
                 
               </form>
         </div>
         
         <div class="mt-4 text-rtl">
             <h2 class="position-relative font-23 semi-font fables-blog-category-head fables-main-text-color fables-second-before pl-3 mb-4">@lang('uboxfrontmodule::front.recent_posts')</h2> 
              
             @foreach ($recent_news as $new)
                 
             <div class="row mb-4">
                  <div class="col-4">
                      <a href="#"><img src="{{ asset('upload/' . $new->image1) }}" alt="" class="w-100"></a>
                  </div>
                  <div class="col-8 pl-0">
                      <a href="#" class="fables-main-text-color bold-font fables-second-hover-color">{{ $new->title }}</a>
                     <p class="fables-forth-text-color fables-blog-date-cat font-14 mt-1">{{ $new->created_at }}</p>
                  </div>
              </div>  
               
             @endforeach
               
              
              
              <hr>
         </div>
         
     </div>
        </div>           
  </div>

@stop
