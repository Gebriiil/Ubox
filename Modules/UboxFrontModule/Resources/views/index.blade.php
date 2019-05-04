@extends('uboxfrontmodule::layouts.master')

@section('content')

@push('javascript')
<script type="text/javascript">
                $(document).ready(function(){
                     $(".web").click(function(e){

                                e.preventDefault();
                                var id=$(this).attr('id');
                                    $.ajax({
                                            url: '{{ url( lang() . "/projectonly")}}',
                                            type:'get',
                                            dataType:'html',
                                            data:{
                                                name:id,
                                            },
                                            success:function(data)
                                            {
                                                $('#text').html(data);
                                            }
                                        });
                                  });
                 });
                 
                    </script>
@endpush
    <!-- Start page content -->
    <div class="container dir-right">
        <div class="row my-3 my-md-5 overflow-hidden">
            <div class="col-12 col-sm-6 col-lg-3 text-center mb-4 mb-lg-0 wow fadeInDown" data-wow-delay=".4s" data-wow-duration="1.5s">
                <span class="fables-iconmobileApp-icon fables-second-text-color fa-3x"></span>
                <h2 class="fables-main-text-color font-18 my-2">Mobile App</h2>
                <p class="fables-forth-text-color font-15">
                    We are working to bring all of your business to your mobile with simple usability and professional simple steps.
                </p>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 text-center mb-4 mb-lg-0 wow fadeInDown" data-wow-delay=".8s" data-wow-duration="1.5s">
                <span class="fables-iconbussiness3 fables-second-text-color fa-3x"></span>
                <h2 class="fables-main-text-color font-18 my-2">Web Application</h2>
                <p class="fables-forth-text-color font-15">
                    Web application development is an important and esay way to convert your daily bussiness requirements into a web applications for clients.
                </p>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 text-center mb-4 mb-lg-0 wow fadeInDown" data-wow-delay="1.2s" data-wow-duration="1.5s">
                <span class="fables-iconbussiness2 fables-second-text-color fa-3x"></span>
                <h2 class="fables-main-text-color font-18 my-2">E-Marketing</h2>
                <p class="fables-forth-text-color font-15">
                    E-marketing is the process of marketing a product or service using the Internet. E-markerting not only includes marketing on the Internet.
                </p>
            </div>
            <div class="col-12 col-sm-6 col-lg-3 text-center mb-4 mb-lg-0 wow fadeInDown" data-wow-delay="1.6s" data-wow-duration="1.5s">
                <span class="fables-iconbussiness4 fables-second-text-color fa-3x"></span>
                <h2 class="fables-main-text-color font-18 my-2">Business Innovation Solution</h2>
                <p class="fables-forth-text-color font-15">
                    Our mission is as clear as it is simple: we deliver the wants and needs of our clients based on professionally set expectations.
                </p>
            </div>
        </div>

    </div>
    <div class="fables-choose-background fables-after-overlay py-4 py-md-5 bg-rules overflow-hidden px-3 px-md-0 dir-right text-rtl">
        <div class="container position-relative z-index">
            <div class="row">
                <div class="col-12 col-lg-6 p-0 image-container translate-effect-right wow fadeInLeft mb-3 mb-md-0" data-wow-delay="1s" data-wow-duration="1.5s">
                    <img src="{{assets('assets/front/custom/images/choose-img.jpg')}}" alt="" class="w-100">
                </div>
                <div class="col-12 col-lg-6 bg-white px-6 py-3 py-md-5 wow fadeInRight" data-wow-delay="1s" data-wow-duration="1.5s">
                    <h2 class="font-30 font-weight-bold fables-second-text-color">WHY CHOOSE US</h2>
                    <p class="fables-main-text-color font-14 my-3">
                        Innovating the technology that makes tomorrow better, is always our passion.
                    </p>
                    <div id="accordion">
                        <div class="card border-0 mb-2">
                            <div class="card-header p-0 border bg-transparent rounded-0" id="headingOne">
                                <h5 class="mb-0 position-relative">
                                <span class="fables-second-background-color white-color d-inline-block
 position-absolute fables-lus-icon pt-2 text-center">
                                    <i class="fas fa-plus"></i>
                                </span>
                                    <button class="btn fables-main-text-color bg-transparent font-18 focus-0 d-block position-relative z-index pl-6 pt-2 pb-2 w-100 text-left border-0 text-truncate" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Integrity
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body fables-forth-text-color font-14 py-1 py-xl-2 pl-6 pr-0">
                                    Honest Business practices build foundations of trust and respect with colleagues, competitors, staff, customers and every other individual and organization.
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 mb-2">
                            <div class="card-header bg-transparent p-0 border rounded-0" id="headingTwo">
                                <h5 class="mb-0 position-relative">
                                <span class="fables-second-background-color white-color d-inline-block
 position-absolute fables-lus-icon pt-2 text-center">
                                    <i class="fas fa-plus"></i>
                                </span>
                                    <button class="btn fables-main-text-color bg-transparent font-18 focus-0 d-block position-relative z-index pl-6 pt-2 pb-2 w-100 text-left border-0 text-truncate collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Excellence
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body fables-forth-text-color font-14 py-1 py-xl-2 pl-6 pr-0">
                                    We perform to provide our customers with the most skillful execution using the best intelligent directions and methods.
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 mb-2">
                            <div class="card-header p-0 border bg-transparent rounded-0" id="headingThree">
                                <h5 class="mb-0 position-relative">
                                <span class="fables-second-background-color white-color d-inline-block
 position-absolute fables-lus-icon pt-2 text-center">
                                    <i class="fas fa-plus"></i>
                                </span>
                                    <button class="btn fables-main-text-color bg-transparent font-18 focus-0 d-block position-relative z-index pl-6 pt-2 pb-2 w-100 text-left border-0 text-truncate collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Innovation
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body fables-forth-text-color font-14 py-1 py-xl-2 pl-6 pr-0">
                                    The challenge with innovation is creating new products and services that are friendly used, easier to maintain and more appealing to customers.
                                </div>
                            </div>
                        </div>
                        <div class="card border-0 mb-2">
                            <div class="card-header p-0 border bg-transparent rounded-0" id="headingfour">
                                <h5 class="mb-0 position-relative">
                                <span class="fables-second-background-color white-color d-inline-block
 position-absolute fables-lus-icon pt-2 text-center">
                                    <i class="fas fa-plus"></i>
                                </span>
                                    <button class="btn fables-main-text-color bg-transparent font-18 focus-0 d-block position-relative z-index pl-6 pt-2 pb-2 w-100 text-left border-0 text-truncate collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                        customers satisfaction
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                                <div class="card-body fables-forth-text-color font-14 py-1 py-xl-2 pl-6 pr-0">
                                    Customer satisfaction is our motto, we strive to customize our creativity to serve our customer's requirements before, during and after service.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 text-center">
                <h2 class="fables-second-text-color font-35 font-weight-bold my-3 mt-md-5 mb-md-4">we are creative agency</h2>
                <p class="fables-forth-text-color">
                    We always strive to be up to our customers’ expectations and to deliver high standard websites and mobile applications designed in a very unique and attractive way. We also look forward to help our customer achieve constant growth by offering them the best marketing plans for their businesses. UBoxPLus is looking forward to be the leading company not only in Egypt, but in MENA.
                </p>
            </div>
        </div>
        <div class="row mt-4 mt-md-5">
            <div class="col-6 col-md-3">
                <div class="fables-counter">
                    <h2 class="fables-counter-value font-40 font-weight-bold mb-3 fables-main-text-color border fables-second-border-color d-inline-block px-4 py-2 mb-4" data-count="307">0</h2>
                    <h3 class="font-14 semi-font fables-forth-text-color">SATISFIED CLIENTS</h3>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="fables-counter">
                    <h2 class="fables-counter-value font-40 font-weight-bold mb-3 fables-main-text-color border fables-second-border-color d-inline-block px-4 py-2 mb-4" data-count="95">0</h2>
                    <h3 class="font-14 semi-font fables-forth-text-color">COMPANY MEMBERS</h3>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="fables-counter">
                    <h2 class="fables-counter-value font-40 font-weight-bold mb-3 fables-main-text-color border fables-second-border-color d-inline-block px-4 py-2 mb-4" data-count="55">0</h2>
                    <h3 class="font-14 semi-font fables-forth-text-color">AWWARDS WIN</h3>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="fables-counter">
                    <h2 class="fables-counter-value font-40 font-weight-bold mb-3 fables-main-text-color border fables-second-border-color d-inline-block px-4 py-2 mb-4" data-count="16">0</h2>
                    <h3 class="font-14 semi-font fables-forth-text-color">YEARS EXPIRIENCE</h3>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="container mb-4 mb-md-5">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <div class="text-center">
                    <h2 class="fables-main-text-color font-35 font-weight-bold mb-4">Latest Works</h2>
                    <p class="fables-forth-text-color">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos reiciendis cum aliquid quam, consequatur. quisquam consectetur culpa commodi maxime in harum sunt nam.

                    </p>
                </div>
            </div>
        </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
        <div class="gallery-filter">
            <div class="portfolioFilter my-3 clearfix">
                <a href="#" data-filter="*" class="current">ALL</a>
                
                @foreach($categories as $category)
                    <a href="" data-filter=".webDesign"  class="fables-forth-text-color web" id="{{$category->id}}">{{$category->name}}</a>
                    
                    
                @endforeach
            </div>
            <div class="portfolioContainer row filter-masonry" id="text">
            @foreach($categories as $category)
                <div class="webDesign food col-sm-6 col-md-3 mb-4">
                    <div class="filter-img-block position-relative image-container translate-effect-right">
                        <img src="{{assets('assets/front/custom/images/blog-slider1.jpg')}}" alt="image">

                        <div class="img-filter-overlay fables-main-color-transparent row m-0">
                            <a href="" class="gallery-filter-icon white-color fables-second-hover-color"><span class="fables-iconlink"></span></a>
                            <a  data-fancybox="gallery" href="{{assets('assets/front/custom/images/blog-slider1.jpg')}}" class="gallery-filter-icon white-color fables-second-hover-color"><span class="fables-iconsearch-icon"></span></a>
                        </div>
                    </div>

                </div>
            @endforeach
            </div>
            <div class="text-center">
                <a href="#" class="btn fables-main-border-color fables-main-text-color mt-md-4 px-5 py-2 fables-btn-rounded fables-main-hover-background-color white-color-hover">Show All Projects</a>
            </div>
        </div>
    </div>
    <div class="fables-testimonial fables-after-overlay py-5 bg-rules dir-right text-rtl">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="fables-contact-caption-txt">
                        <h3 class="font-25 font-weight-bold white-color mb-3 position-relative z-index">Your Visison Is Our Mission</h3>
                        <!--                           <p class="fables-third-text-color position-relative z-index font-weight-light"></p>-->

                    </div>
                </div>
                <div class="col-12 col-md-4 offset-xl-2 col-xl-2 text-center">
                    <a href="contact.html" class="btn fables-second-background-color fables-btn-rounded white-color mt-3 position-relative z-index font-19 px-5 py-2 white-color-hover">Contact us</a>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row overflow-hidden">
            <div class="col-12">
                <h2 class="font-35 font-weight-bold text-center fables-main-text-color my-4 my-lg-5">Latest News</h2>
            </div>
            @foreach($news as $new)
            <div class="col-12 col-md-4 mb-4 mb-lg-5 wow bounceInLeft" data-wow-delay="1.2s" data-wow-duration="1.5s">
                <div class="image-container translate-effect-right">
                    <a href="#"><img src="{{assets('assets/front/custom/images/cat-larg6.jpg')}}" alt=""></a>
                </div>
                <h2 class="font-18 semi-font font-18  mt-3 text-rtl"><a href="#" class="fables-main-text-color fables-second-hover-color">{{$new->title}}</a></h2>
                <p class="fables-fifth-text-color font-13 my-1 text-rtl">{{ $new->created_at }}</p>
                <p class="fables-forth-text-color font-14 text-rtl">{{$new->desc}}
                </p>
                <a href="{{ route('only_new' , $new->id) }}" class="btn fables-main-text-color fables-second-hover-color p-0 underline mt-2 fl-right">Read More</a>

            </div>
            @endforeach
        </div>
    </div>
    <div class="fables-testimonial fables-after-overlay py-4 py-lg-5 bg-rules">
        <div class="container">
            <h2 class="position-relative z-index white-color font-35 font-weight-bold text-center mb-4">Testimonial</h2>
            <div class="owl-carousel owl-theme" id="fables-testimonial-carousel">
                <div class="row text-center fables-testimonial-carousel-item rounded py-4">
                    <div class="col-12 col-md-3">
                        <img src="{{assets('assets/front/custom/images/testimonial-img.png')}}" alt="Fables Template" class="fables-testimonial-carousel-img">
                        <h3 class="font-14 semi-font text-white">Billy Richards</h3>
                        <h3 class="font-14 font-italic text-white mt-2">Chief Manager, Simba Co</h3>
                    </div>
                    <div class="col-12 col-md-9 p-0 p-md-2">
                        <div class="fables-testimonial-detail font-15 font-italic text-white p-4 position-relative">
                            No matter what issue or questions pops up, you are always there to
                            assist me. Thank you so much for your excellent assistance and great
                            customer support through years.
                        </div>
                    </div>
                </div>
                <div class="row text-center fables-testimonial-carousel-item rounded py-4">
                    <div class="col-12 col-md-3">
                        <img src="{{assets('assets/front/custom/images/testimonial-img.png')}}" alt="Fables Template" class="fables-testimonial-carousel-img">
                        <h3 class="font-14 semi-font text-white">Billy Richards</h3>
                        <h3 class="font-14 font-italic text-white mt-2">Chief Manager, Simba Co</h3>
                    </div>
                    <div class="col-12 col-md-9 p-0 p-md-2">
                        <div class="fables-testimonial-detail font-15 font-italic text-white p-4 position-relative">
                            No matter what issue or questions pops up, you are always there to
                            assist me. Thank you so much for your excellent assistance and great
                            customer support through years.
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="font-35 font-weight-bold text-center fables-main-text-color my-3 my-lg-5">Team</h2>
        <div class="row overflow-hidden">
            <div class="col-6 col-md-3 mb-4 wow bounceInDown" data-wow-delay=".4s" data-wow-duration="1.5s">
                <div class="card fables-team-block fables-second-hover-text-color fables-team-border fables-second-border-color">
                    <div class="image-container shine-effect">
                        <a href="#"><img class="w-100" src="{{assets('assets/front/custom/images/team3-1.jpg')}}" alt="Card image cap"></a>
                    </div>
                    <div class="card-body">
                        <h5><a href="#" class="font-20 semi-font fables-forth-text-color fables-second-hover-color team-name">JOHN MARTIN</a></h5>
                        <p class="font-13 fables-forth-text-color my-1">Programmer</p>
                        <ul class="nav fables-team-social-links">
                            <li><a href="#" target="_blank"><span class="fables-icongoogle-icon fables-forth-text-color fables-fifth-border-color fables-team-social-icon"></span></a></li>
                            <li><a href="#" target="_blank"><span class="fables-iconwhatapp-icon fables-forth-text-color fables-fifth-border-color fables-team-social-icon"></span></a></li>
                            <li><a href="#" target="_blank"><span class="fables-icontwitter-icon fables-forth-text-color fables-fifth-border-color fables-team-social-icon"></span></a></li>
                            <li><a href="#" target="_blank"><span class="fables-iconinstagram-icon fables-forth-text-color fables-fifth-border-color fables-team-social-icon"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4 wow bounceInDown" data-wow-delay=".8s" data-wow-duration="1.5s">
                <div class="card fables-team-block fables-second-hover-text-color fables-team-border fables-second-border-color">
                    <div class="image-container shine-effect">
                        <a href="#"><img class="w-100" src="{{assets('assets/front/custom/images/team3-2.jpg')}}" alt="Card image cap"></a>
                    </div>
                    <div class="card-body">
                        <h5><a href="#" class="font-20 semi-font fables-forth-text-color fables-second-hover-color team-name">JOHN MARTIN</a></h5>
                        <p class="font-13 fables-forth-text-color my-1">Programmer</p>
                        <ul class="nav fables-team-social-links">
                            <li><a href="#" target="_blank"><span class="fables-icongoogle-icon fables-forth-text-color fables-fifth-border-color fables-team-social-icon"></span></a></li>
                            <li><a href="#" target="_blank"><span class="fables-iconwhatapp-icon fables-forth-text-color fables-fifth-border-color fables-team-social-icon"></span></a></li>
                            <li><a href="#" target="_blank"><span class="fables-icontwitter-icon fables-forth-text-color fables-fifth-border-color fables-team-social-icon"></span></a></li>
                            <li><a href="#" target="_blank"><span class="fables-iconinstagram-icon fables-forth-text-color fables-fifth-border-color fables-team-social-icon"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4 wow bounceInDown" data-wow-delay="1.2s" data-wow-duration="1.5s">
                <div class="card fables-team-block fables-second-hover-text-color fables-team-border fables-second-border-color">
                    <div class="image-container shine-effect">
                        <a href="#"><img class="w-100" src="{{assets('assets/front/custom/images/team3-1.jpg')}}" alt="Card image cap"></a>
                    </div>
                    <div class="card-body">
                        <h5><a href="#" class="font-20 semi-font fables-forth-text-color fables-second-hover-color team-name">JOHN MARTIN</a></h5>
                        <p class="font-13 fables-forth-text-color my-1">Programmer</p>
                        <ul class="nav fables-team-social-links">
                            <li><a href="#" target="_blank"><span class="fables-icongoogle-icon fables-forth-text-color fables-fifth-border-color fables-team-social-icon"></span></a></li>
                            <li><a href="#" target="_blank"><span class="fables-iconwhatapp-icon fables-forth-text-color fables-fifth-border-color fables-team-social-icon"></span></a></li>
                            <li><a href="#" target="_blank"><span class="fables-icontwitter-icon fables-forth-text-color fables-fifth-border-color fables-team-social-icon"></span></a></li>
                            <li><a href="#" target="_blank"><span class="fables-iconinstagram-icon fables-forth-text-color fables-fifth-border-color fables-team-social-icon"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4 wow bounceInDown" data-wow-delay="1.6s" data-wow-duration="1.5s">
                <div class="card fables-team-block fables-second-hover-text-color fables-team-border fables-second-border-color">
                    <div class="image-container shine-effect">
                        <a href="#"><img class="w-100" src="{{assets('assets/front/custom/images/team3-2.jpg')}}" alt="Card image cap"></a>
                    </div>
                    <div class="card-body">
                        <h5><a href="#" class="font-20 semi-font fables-forth-text-color fables-second-hover-color team-name">JOHN MARTIN</a></h5>
                        <p class="font-13 fables-forth-text-color my-1">Programmer</p>
                        <ul class="nav fables-team-social-links">
                            <li><a href="#" target="_blank"><span class="fables-icongoogle-icon fables-forth-text-color fables-fifth-border-color fables-team-social-icon"></span></a></li>
                            <li><a href="#" target="_blank"><span class="fables-iconwhatapp-icon fables-forth-text-color fables-fifth-border-color fables-team-social-icon"></span></a></li>
                            <li><a href="#" target="_blank"><span class="fables-icontwitter-icon fables-forth-text-color fables-fifth-border-color fables-team-social-icon"></span></a></li>
                            <li><a href="#" target="_blank"><span class="fables-iconinstagram-icon fables-forth-text-color fables-fifth-border-color fables-team-social-icon"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- /End page content -->



@stop
