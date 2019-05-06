@extends('uboxfrontmodule::layouts.master')

@section('content')

     
<!-- Start Breadcrumbs -->
<div class="fables-light-gary-background">
    <div class="container"> 
        <nav aria-label="breadcrumb">
          <ol class="fables-breadcrumb breadcrumb px-0 py-3">
            <li class="breadcrumb-item"><a href="index.html" class="fables-second-text-color">@lang('uboxfrontmodule::front.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('uboxfrontmodule::front.about_us')</li>
          </ol>
        </nav> 
    </div>
</div>
<!-- /End Breadcrumbs -->
     
<!-- Start page content -->  
       <div class="container">
            <div class="my-4 my-md-5 overflow-hidden">
               
                <div class="text-center mb-5 wow fadeInDown" data-wow-delay="1s">
                    <h3 class="fables-about-top-head fables-forth-text-color font-15 semi-font d-inline-block bg-white position-relative">
                        <span class="mx-4">@lang('uboxfrontmodule::front.services')</span>
                    </h3>
                    <h2 class="fables-second-text-color mt-3 font-30 font-weight-bold text-center">@lang('uboxfrontmodule::front.Provide you the great Services')</h2> 
                </div> 
                    
                <div class="row dir-right">
                    <div class="col-12 col-md-4 mb-4 mb-md-0 wow fadeInDown" data-wow-delay=".3s">
                        <div class="fables-about-icon-style"> 
                            <span class="fables-iconmobileApp-icon fables-second-text-color fa-3x"></span>
                            <h2 class="fables-second-text-color fables-about-icon-head mt-3 mb-2 font-18 semi-font">@lang('uboxfrontmodule::front.Mobile Application') </h2>
                            <span class="fables-title-border fables-second-background-color"></span>
                            <div class="fables-forth-text-color mt-3 font-14">
                                @lang('uboxfrontmodule::front.We are working to bring all of your')
                              
                            </div>

                        </div>
                    </div>  
                    <div class="col-12 col-md-4 mb-4 mb-md-0 wow fadeInDown" data-wow-delay=".6s">
                       <div class="fables-about-icon-style">
                           <span class="fables-icondevelopment-icon fables-second-text-color fa-3x"></span>
                           <h2 class="fables-second-text-color fables-about-icon-head mt-3 mb-2 font-18 semi-font">@lang('uboxfrontmodule::front.Development')</h2>
                           <span class="fables-title-border fables-second-background-color"></span>
                           <div class="fables-forth-text-color mt-3 font-14">
                            @lang('uboxfrontmodule::front.Web application development is')
                               
                            </div>
                        </div> 
                    </div>
                    <div class="col-12 col-md-4 mb-4 mb-md-0 wow fadeInDown" data-wow-delay=".9s">
                       <div class="fables-about-icon-style"> 
                            <span class="fables-iconbussiness4 fables-second-text-color fa-3x"></span>
                           <h2 class="fables-second-text-color fables-about-icon-head mt-3 mb-2 font-18 semi-font">@lang('uboxfrontmodule::front.Business Innovation Solution')</h2>
                           <span class="fables-title-border fables-second-background-color"></span>
                            <div class="fables-forth-text-color mt-3 font-14">
                                @lang('uboxfrontmodule::front.Business Innovation Solution desc')
                              
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
       </div>
       <div class="container-fluid"> 
           <div class="row overflow-hidden">
               <div class="col-12 col-sm-6 p-sm-0 mb-3 mb-md-0 image-container translate-effect-right wow fadeInLeft" data-wow-durationn="2.5s">
                   <img src="{{asset('../assets/front/custom/images/hp_innovacion2.jpg')}}" alt="Fables Template" class="img-fluid">
               </div>
               <div class="col-12 col-sm-6 p-sm-0 image-container translate-effect-right wow fadeInRight" data-wow-durationn="2.5s">
                   <img src="{{asset('../assets/front/custom/images/IMG_8573-1078.jpg')}}" alt="Fables Template" class="img-fluid">
               </div>
           </div>
           
       </div>
       <div class="fables-counter-no-background my-4 my-md-5 overflow-hidden">
           <div class="container">
               <div class="fables-about-head-style">
                    <div class="row wow fadeInDown" data-wow-delay=".5s">
                        <div class="col-12 text-center">
                            <h3 class="fables-about-top-head fables-forth-text-color font-15 semi-font d-inline-block bg-white position-relative">
                                <span class="mx-4">@lang('uboxfrontmodule::front.about_us')</span>
                            </h3>
                            <h2 class="fables-second-text-color mt-3 font-30 font-weight-bold text-center">@lang('uboxfrontmodule::front.Our business experties')</h2>  
                        </div>
                        <div class="col-12 col-md-10 offset-md-1 mt-3 mb-5">
                            <p class="fables-forth-text-color text-center">
                                @lang('uboxfrontmodule::front.Being the best')
                            </p>
                        </div> 
                    </div>
                </div>
               
               <div class="row wow fadeIn" data-wow-delay=".8s">
                   <div class="col-6 col-md-3">
                       <div class="fables-counter">
                           <h2 class="fables-counter-value font-40 font-weight-bold mb-3 fables-forth-text-color" data-count="307">0</h2>
                           <h3 class="font-14 semi-font fables-forth-text-color"> @lang('uboxfrontmodule::front.SATISFIED CLIENTS')</h3>
                       </div>
                   </div>
                   <div class="col-6 col-md-3">
                       <div class="fables-counter">
                           <h2 class="fables-counter-value font-40 font-weight-bold mb-3 fables-forth-text-color" data-count="95">0</h2>
                           <h3 class="font-14 semi-font fables-forth-text-color">@lang('uboxfrontmodule::front.COMPANY MEMBERS')</h3>
                       </div>
                   </div>
                   <div class="col-6 col-md-3">
                       <div class="fables-counter">
                           <h2 class="fables-counter-value font-40 font-weight-bold mb-3 fables-forth-text-color" data-count="55">0</h2>
                           <h3 class="font-14 semi-font fables-forth-text-color">@lang('uboxfrontmodule::front.AWWARDS WIN')</h3>
                       </div>
                   </div>
                   <div class="col-6 col-md-3">
                       <div class="fables-counter">
                           <h2 class="fables-counter-value font-40 font-weight-bold mb-3 fables-forth-text-color" data-count="16">0</h2>
                           <h3 class="font-14 semi-font fables-forth-text-color">@lang('uboxfrontmodule::front.YEARS EXPIRIENCE')</h3>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       
       <div class="fables-history-section mb-4 mb-md-5">
           <div class="container">
               <div class="fables-about-head-style">
                    <div class="row wow fadeInDown" data-wow-delay=".5s">
                        <div class="col-12 text-center">
                            <h3 class="fables-about-top-head fables-forth-text-color font-15 semi-font d-inline-block bg-white position-relative">
                                <span class="mx-4">@lang('uboxfrontmodule::front.about_us')</span>
                            </h3>
                            <h2 class="fables-second-text-color mt-3 font-30 font-weight-bold text-center">@lang('uboxfrontmodule::front.Company History')</h2> 
                            <div class="col-12 col-md-10 offset-md-1">
                                <p class="fables-forth-text-color mt-3 mb-4 mb-md-5">
                                  @lang('uboxfrontmodule::front.The company was established in')
                                     
                                </p>
                            </div>
                        </div> 
                    </div>
                </div>

           </div>
       </div>
       
           <div class="bg-rules mb-4 mb-lg-0 py-3 py-lg-0" style="background-image: url('{{asset('../assets/front/custom/images/mission-img.jpg')}}')">  
               <div class="container-fluid">             
                    <div class="row overflow-hidden text-rtl">    
                        <div class="col-12 col-lg-6 offset-lg-6 p-lg-0">  
                            <div class="fables-vision-overlay fables-after-overlay bg-rules">
                                <h2 class="fables-second-text-color my-0 font-30 font-weight-bold position-relative z-index wow fadeInRight" data-wow-duration="2s">@lang('uboxfrontmodule::front.We love what we do') <br> &@lang('uboxfrontmodule::front. we do it with passion!')</h2>
                                <p class="fables-fifth-text-color position-relative z-index mt-4 mb-4 mb-md-5 wow fadeInRight" data-wow-duration="2s">
                                  @lang('uboxfrontmodule::front.We are a Web Solutions')
                                 
                                </p>
<<<<<<< HEAD
                                <a href="contact.html" class="btn fables-second-border-color white-color fables-btn-rouned fables-hover-btn-color font-19 px-5 py-2 position-relative z-index wow fadeInRight" data-wow-duration="2s"><span>@lang('uboxfrontmodule::front.contact_us')</span></a>
=======
                                <a href="{{ route('contact')}}" class="btn fables-second-border-color white-color fables-btn-rouned fables-hover-btn-color font-19 px-5 py-2 position-relative z-index wow fadeInRight" data-wow-duration="2s"><span>Contact Us</span></a>
>>>>>>> b29967eb9d6308cfc2d9aeb1b861b77957427add
                            </div>

                        </div>
                    </div>
              </div>
            </div>
            <div class="bg-rules mb-4 py-3 py-lg-0" style="background-image: url('{{asset('../assets/front/custom/images/vision-img.jpg')}}')"> 
                 <div class="container-fluid">
                   <div class="row overflow-hidden text-rtl"> 
                    <div class="col-12 col-lg-6 p-lg-0"> 
                        <div class="fables-vision-overlay fables-after-overlay fables-light-overlay bg-rules">
                            <h2 class="fables-second-text-color my-0 font-30 font-weight-bold position-relative z-index wow fadeInLeft" data-wow-duration="2s">
                              @lang('uboxfrontmodule::front.We gain the trust and loyalty of') <br>
                              @lang('uboxfrontmodule::front.our Clients') </h2>
                            <p class="fables-forth-text-color position-relative z-index mt-4 mb-4 mb-md-5 wow fadeInLeft" data-wow-duration="2s">
                              @lang('uboxfrontmodule::front.We always strive to be up to our customers')
                              
                            </p>

                            <a href="contact.html" class="btn fables-second-border-color fables-second-text-color fables-btn-rouned fables-hover-btn-color font-19 px-5 py-2 position-relative z-index wow fadeInLeft" data-wow-duration="2s"><span>@lang('uboxfrontmodule::front.contact_us')</span></a>
                        </div>                    
                    </div>

                </div>
             </div>  
         </div> 
     
    <div class="container"> 
        <div class="row mt-4 mt-md-5">
            <div class="col-12 text-center wow fadeInDown">
                <h3 class="fables-about-top-head fables-forth-text-color font-15 semi-font d-inline-block bg-white position-relative">
                    <span class="mx-4">@lang('uboxfrontmodule::front.Testimonials')</span>
                </h3>
                <h2 class="fables-second-text-color mt-3 font-30 font-weight-bold text-center">@lang('uboxfrontmodule::front.what people say')</h2> 
            </div>
            <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 wow fadeInDown">
                <p class="mt-4 mt-md-3 mb-4 mb-md-5 fables-forth-text-color text-center">
                    @lang('uboxfrontmodule::front.We’ve been lucky') 
                </p>
            </div>
        </div> 
        <div class="row dir-right text-rtl">
            <div class="col-12 col-sm-6 wow fadeInDown" data-wow-delay=".3s">
                 <div class="fables-testimonial-block border fables-third-text-color py-4 px-6 mb-4 rounded position-relative">  
                      <div class="row">
                          <div class="col-12 col-sm-3 text-center image-container shine-effect">
                               <img src="{{asset('..assets/front/custom/images/testimonial-img.png')}}" alt="Fables Template" class="fables-testimonial-block-img rounded-circle">  
                          </div>
                          <div class="col-12 col-sm-8">
                              <div class="fables-testimonial-block-info">
                                  <h3 class="fables-forth-text-color mt-4 mb-2 font-15 semi-font">Billy Richards</h3>
                                  <h3 class="fables-fifth-text-color font-italic font-14 mt-2">Chief Manager, Simba Co</h3>
                              </div>
                          </div>
                      </div>
                      <div class="fables-forth-text-color font-italic font-14 semi-font mt-3"> 
                            No matter what issue or questions pops up, you are always there to 
                            assist me. Thank you so much for your excellent assistance and great 
                            customer support through years.
                      </div>
                 </div> 
            </div>
            <div class="col-12 col-sm-6 wow fadeInDown" data-wow-delay=".6s">
                 <div class="fables-testimonial-block border fables-third-text-color py-4 px-6 mb-4 rounded position-relative">  
                      <div class="row">
                          <div class="col-12 col-sm-3 text-center image-container shine-effect">
                               <img src="{{asset('../assets/front/custom/images/testimonial-img.png')}}" class="fables-testimonial-block-img rounded-circle">    
                          </div>
                          <div class="col-12 col-sm-8">
                              <div class="fables-testimonial-block-info">
                                  <h3 class="fables-forth-text-color mt-4 mb-2 font-15 semi-font">Billy Richards</h3>
                                  <h3 class="fables-fifth-text-color font-italic font-14 mt-2">Chief Manager, Simba Co</h3>
                              </div>
                          </div>
                      </div>
                      <div class="fables-forth-text-color font-italic font-14 semi-font mt-3"> 
                            No matter what issue or questions pops up, you are always there to 
                            assist me. Thank you so much for your excellent assistance and great 
                            customer support through years.
                      </div>
                 </div> 
            </div>
            <div class="col-12 col-sm-6 wow fadeInDown" data-wow-delay=".9s">
                 <div class="fables-testimonial-block border fables-third-text-color py-4 px-6 mb-4 rounded position-relative">
                      <div class="row">
                          <div class="col-12 col-sm-3 text-center image-container shine-effect">
                               <img src="{{asset('../assets/front/custom/images/testimonial-img.png')}}" alt="Fables Template" class="fables-testimonial-block-img rounded-circle">  
                          </div>
                          <div class="col-12 col-sm-8">
                              <div class="fables-testimonial-block-info">
                                  <h3 class="fables-forth-text-color mt-4 mb-2 font-15 semi-font">Billy Richards</h3>
                                  <h3 class="fables-fifth-text-color font-italic font-14 mt-2">Chief Manager, Simba Co</h3>
                              </div>
                          </div>
                      </div>
                      <div class="fables-forth-text-color font-italic font-14 semi-font mt-3"> 
                            No matter what issue or questions pops up, you are always there to 
                            assist me. Thank you so much for your excellent assistance and great 
                            customer support through years.
                      </div>
                 </div> 
            </div>
            <div class="col-12 col-sm-6 wow fadeInDown" data-wow-delay="1.2s">
                 <div class="fables-testimonial-block border fables-third-text-color py-4 px-6 mb-4 rounded position-relative"> 
                      <div class="row">
                          <div class="col-12 col-sm-3 text-center image-container shine-effect">
                               <img src="{{asset('..assets/front/custom/images/testimonial-img.png')}}" alt="Fables Template" class="fables-testimonial-block-img rounded-circle">  
                          </div>
                          <div class="col-12 col-sm-8">
                              <div class="fables-testimonial-block-info">
                                  <h3 class="fables-forth-text-color mt-4 mb-2 font-15 semi-font">Billy Richards</h3>
                                  <h3 class="fables-fifth-text-color font-italic font-14 mt-2">Chief Manager, Simba Co</h3>
                              </div>
                          </div>
                      </div>
                      <div class="fables-forth-text-color font-italic font-14 semi-font mt-3"> 
                            No matter what issue or questions pops up, you are always there to 
                            assist me. Thank you so much for your excellent assistance and great 
                            customer support through years.
                      </div>
                 </div> 
            </div>
        </div>  

       
        <div class="fables-team">             
            <div class="row wow fadeInDown">
                <div class="col-12 text-center mt- mt-md-5">
                    <h3 class="fables-about-top-head fables-forth-text-color font-15 semi-font d-inline-block bg-white position-relative">
                        <span class="mx-4">@lang('uboxfrontmodule::front.Team')</span>
                    </h3>
                    <h2 class="fables-second-text-color mt-3 font-30 font-weight-bold text-center">@lang('uboxfrontmodule::front.Meet The Team')</h2> 
                </div>
                <div class="col-12 col-md-8 offset-md-2">
                    <p class="mt-4 mt-md-3 mb-4 mb-md-5 fables-forth-text-color text-center">
                      @lang('uboxfrontmodule::front.We love what we do and we do it with passion.')
                   
                    </p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12 col-md-12 mb-12 mb-lg-0 wow fadeInDown" data-wow-delay=".3s">
                    <div class="card fables-team-block fables-team-data-hover fables-second-border-color">
                      <img class="img-fluid" src="{{assets('assets/front/custom/images/happy-employees.jpg')}}" style="height: 455px; width: 1102px;" alt="Card image cap">
                    </div>
                </div>
            </div>  
               
        </div>       
       
    </div>
    <br>
      
<!-- /End page content -->
	@stop