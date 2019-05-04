@extends('uboxfrontmodule::layouts.master')

@section('content')

    @push('javascript')

    <link rel="stylesheet" type="text/css" href="{{asset('/assets/front/css/notifIt.css')}}">

    <script src="{{ asset('/assets/front/js/notifIt.js') }}"></script>



    @if( session('success'))
        <script>

            notif({
                msg: "<b>{{session('success')}}</b>",
                type: "success"
            });


        </script>
    @endif

@endpush
    
<div class="fables-light-background-color">
    <div class="container"> 
        <nav aria-label="breadcrumb">
          <ol class="fables-breadcrumb breadcrumb px-0 py-3">
            <li class="breadcrumb-item"><a href="index.html" class="fables-second-text-color">Home</a></li>
			   <li class="breadcrumb-item"><a href="blog.html" class="fables-second-text-color">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
          </ol>
        </nav> 
    </div>
</div>

    <div class="container dir-right">
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
                         <h2 class="font-23 semi-font my-3 text-rtl"><a href="#" class="fables-main-text-color fables-second-hover-color">Getting to Another Level of Design</a></h2>
                 <div class="fables-forth-text-color fables-blog-date">                                  
                     <div class="row">
                         <div class="col-12 col-sm-10 pt-2">
                                 <span class="fables-icondata fables-second-text-color mr-1"></span> 
                                 <span class="mr-3"> 09 November, 2018 </span>
                                 <span class="fables-iconcomment fables-second-text-color mr-1"></span> 
                                 <a href="" class="fables-forth-text-color fables-second-hover-color position-relative z-index">2</a> 
                                 <span class="fables-forth-text-color fables-single-tags ml-4">
                                     <span class="fables-icontags-light fables-second-text-color"></span> 
                                     <a href="#">dress fashion</a>
                                     <a href="#">JACKETS</a> 
                                 </span> 

                         </div> 
                     </div>

                 </div>
                 <p class="fables-forth-text-color fables-single-blog font-14 my-3 text-rtl">
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis iaculis egestas nisl vel faucibus. Pellentesque ac dapibus orci. In aliquam nisi at est posuere ornare. Aliquam scelerisque magna a turpis mollis, eu interdum enim commodo. In quis tellus consequat, vehicula nunc pretium, gravida mauris. In commodo convallis massa, sit amet gravida erat dictum vitae. Etiam sollicitudin leo ut quam egestas, 
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis iaculis egestas nisl vel faucibus. Pellentesque ac dapibus orci. In aliquam nisi at est posuere ornare. Aliquam scelerisque magna a turpis mollis, eu interdum enim commodo. In quis tellus consequat, vehicula nunc pretium, gravida mauris. In commodo convallis massa, sit amet gravida erat dictum vitae. Etiam sollicitudin leo ut quam egestas, 
                     <br><br>
                     ullamcorper placerat nunc facilisis. Nunc iaculis, lorem euismod euismod venenatis, magna leo euismod felis, et laoreet velit lacus ac nisl lorem euismod euismod venenatis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis iaculis egestas nisl vel faucibus. Pellentesque ac dapibus orci. In aliquam nisi at est posuere ornare
                      <br><br> 
                   . Aliquam scelerisque magna a turpis mollis, eu interdum enim commodo. In quis tellus consequat, vehicula nunc pretium, gravida mauris. In commodo convallis massa, sit amet gravida erat dictum vitae. Etiam sollicitudin leo ut quam egestas, ullamcorper placerat nunc facilisis. Nunc iaculis, lorem euismod euismod venenatis, magna leo euismod felis, et laoreet velit lacus ac nisl lorem euismod euismod venenatis.Lorem ipsum dolor sit amet, consectetur adipiscing  
                 </p>
                 <div class="fabales-single-share">
                    <div class="row mt-3 mb-4">
                         <div class="col-3 col-sm-2">
                             <span class="fables-forth-text-color underline  mt-2 font-18 d-inline-block">Share</span>
                         </div>
                         <div class="col-9 col-md-7">                                          
                             <ul class="nav mt-2">
                                 <li><a href="" class="fables-forth-text-color fables-single-link fables-second-hover-color"><span class="fables-icongooglePlus"></span></a></li>
                                 <li><a href="" class="fables-forth-text-color fables-single-link fables-second-hover-color"><span class="fables-iconfacebook"></span></a></li>
                                 <li><a href="" class="fables-forth-text-color fables-single-link fables-second-hover-color"><span class="fables-iconinstagram"></span></a></li>
                                 <li><a href="" class="fables-forth-text-color fables-single-link fables-second-hover-color"><span class="fables-iconpinterest"></span></a></li>
                                 <li><a href="" class="fables-forth-text-color fables-single-link fables-second-hover-color"><span class="fables-icontwitter"></span></a></li>
                                 <li><a href="" class="fables-forth-text-color fables-single-link fables-second-hover-color"><span class="fables-iconlinkedIn"></span></a></li>
                             </ul>
                         </div>
                          <div class="col-12 col-sm-3 mt-3 mt-sm-0 text-center">
                             <button class="btn btn-link fables-forth-border-color fables-forth-hover-backround-color fables-forth-text-color text-center font-14 float-none float-sm-right py-2 px-4" onclick="window.print();"><span class="fables-iconprint"></span> Print Article</button>
                         </div>

                     </div>
                      
                 </div>  
                 <hr>
                 <div class="fables-single-blog-pag">
                     <a href="" class="fables-forth-text-color fables-second-hover-color">
                         <span class="fables-iconarrow-left"></span> 
                         <span class="underline">Back</span>
                     </a>
                     <a href="" class="fables-forth-text-color fables-second-hover-color float-right">   
                        <span class="underline">Next</span>
                        <span class="fables-iconarrow-right"></span>
                     </a>
                 </div>
                 <hr>
                 <div class="row text-rtl">
                     <div class="col-2">
                         <img src="assets/custom/images/avatar.jpg" alt="" class="img-fluid">
                     </div>
                     <div class="col-10">
                         <p>
                             <span class="fables-fifth-text-color font-14">Posted By</span>
                             <a href="" class="fables-second-text-color fables-second-hover-color font-15 bold-font ml-1">Admin</a>
                         </p>
                         <p class="font-14 my-2 fables-main-text-color">
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis iaculis egestas nisl velino in faucibus. Pellentes  
                         </p>
                     </div>
                 </div>

             <div class="fables-comments">
                 <h2 class="fables-main-text-color fables-light-background-color my-3 my-lg-4 font-15 bold-font py-3 px-4">Comments</h2>
                 <div class="fables-comments">
                     <p>
                         <span class="fables-fifth-text-color font-14 fl-right">Posted By</span>
                         <a href="" class="fables-forth-text-color fables-second-hover-color font-15 bold-font ml-1 fl-right">Ahmed</a>
                         <span class="fables-forth-text-color float-right font-14 fl-left">09 November, 2018</span>
                     </p>
                     <p class="font-14 fables-fifth-text-color">
                         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis iaculis egestas nisl velino in faucibus. Pellentes  
                     </p>
                 </div>
                 <hr>
                 <div class="fables-comments">
                     <p>
                         <span class="fables-fifth-text-color font-14 fl-right">Posted By</span>
                         <a href="" class="fables-forth-text-color fables-second-hover-color font-15 bold-font ml-1 fl-right">Ahmed</a>
                         <span class="fables-forth-text-color float-right font-14 fl-left">09 November, 2018</span>
                     </p>
                     <p class="font-14 fables-fifth-text-color">
                         Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis iaculis egestas nisl velino in faucibus. Pellentes  
                     </p>
                 </div>
             </div>

             <div class="fables-blog-form">
                 <h2 class="fables-main-text-color fables-light-background-color my-3 my-lg-4 font-15 bold-font py-3 px-4">Leave a comment ...</h2>
                 <form class="fables-contact-form mb-0">
                 <div class="form-row">
                     <div class="form-group col-md-6">
                         <input type="text" class="form-control form-control rounded-0 p-3"  placeholder="Name">   
                     </div>
                     <div class="form-group col-md-6">
                         <input type="email" class="form-control form-control rounded-0 p-3" placeholder="Email"> 
                     </div>
                 </div>                            
                 <div class="form-row"> 
                      <div class="form-group col-md-12">
                          <textarea class="form-control form-control rounded-0 p-3" placeholder="Comment" rows="4"></textarea>
                     </div> 
                 </div>
                 <div class="form-row">
                   <div class="form-group col-md-12">
                       <button type="submit" class="btn fables-second-background-color rounded-0 text-white font-15 px-4 py-2">Post Comment</button>
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
                        <button type="submit" class="btn fables-second-background-color rounded-0 text-white font-15 semi-font py-2 btn-block">Search</button>
                    </div>
                 </div> 
                 
               </form>
         </div>
         <div class="mt-4">
             <h2 class="position-relative font-23 semi-font fables-blog-category-head fables-main-text-color fables-second-before pl-3 mb-4 text-rtl">Categories</h2>
             <ul class="nav fables-blog-cat-list fables-forth-text-color fables-second-hover-color-link">
                 <li><a href="">Economy</a></li>
                 <li><a href="">Insights</a></li>
                 <li><a href="">Investing Strategy</a></li>
                 <li><a href="">Market</a></li>
                 <li><a href="">Politics Money</a></li>
                 <li><a href="">Retirement</a></li>
             </ul>
             <hr>
         </div>
         <div class="mt-4 text-rtl">
             <h2 class="position-relative font-23 semi-font fables-blog-category-head fables-main-text-color fables-second-before pl-3 mb-4">Recent Posts</h2> 
              <div class="row mb-4">
                  <div class="col-4">
                      <a href="#"><img src="assets/custom/images/blog-cat1.jpg" alt="" class="w-100"></a>
                  </div>
                  <div class="col-8 pl-0">
                      <a href="#" class="fables-main-text-color bold-font fables-second-hover-color">Getting to Another Level  of Design</a>
                     <p class="fables-forth-text-color fables-blog-date-cat font-14 mt-1">09 November, 2018</p>
                  </div>
              </div>  
              <div class="row mb-4">
                  <div class="col-4">
                      <a href="#"><img src="assets/custom/images/blog-cat2.jpg" alt="" class="w-100"></a>
                  </div>
                  <div class="col-8 pl-0">
                      <a href="#" class="fables-main-text-color bold-font fables-second-hover-color">Getting to Another Level  of Design</a>
                     <p class="fables-forth-text-color fables-blog-date-cat font-14 mt-1">09 November, 2018</p>
                  </div>
              </div>  
              <div class="row mb-4">
                  <div class="col-4">
                      <a href="#"><img src="assets/custom/images/blog-cat3.jpg" alt="" class="w-100"></a>
                  </div>
                  <div class="col-8 pl-0">
                      <a href="#" class="fables-main-text-color bold-font fables-second-hover-color">Getting to Another Level  of Design</a>
                     <p class="fables-forth-text-color fables-blog-date-cat font-14 mt-1">09 November, 2018</p>
                  </div>
              </div>  
              <div class="row mb-4">
                  <div class="col-4">
                      <a href="#"><img src="assets/custom/images/blog-cat4.jpg" alt="" class="w-100"></a>
                  </div>
                  <div class="col-8 pl-0">
                      <a href="#" class="fables-main-text-color bold-font fables-second-hover-color">Getting to Another Level  of Design</a>
                     <p class="fables-forth-text-color fables-blog-date-cat font-14 mt-1">09 November, 2018</p>
                  </div>
              </div> 
              <div class="text-rtl">
                  <a href="#" class="btn fables-second-text-color underline fables-main-text-color font-14"> More</a>
              </div>
              <hr>
         </div>
         <div class="mt-4 text-rtl">
             <h2 class="position-relative font-23 semi-font fables-blog-category-head fables-main-text-color fables-second-before pl-3 mb-4">Tages</h2>
             <ul class="nav fables-blog-cat-list fables-forth-text-color fables-second-hover-color-link fables-blog-cat-tags">
                 <li><a href="">Accountant</a></li>
                 <li><a href="">Online Services </a></li>
                 <li><a href="">Accountant</a></li>
                 <li><a href="">Accountant</a></li>
                 <li><a href="">Accountant</a></li>
                 <li><a href="">Online Services </a></li>
             </ul> 
         </div>
     </div>
        </div>           
  </div>

@stop
