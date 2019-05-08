@extends('uboxfrontmodule::layouts.master')

@section('content')


<!-- Start Breadcrumbs -->
<div class="fables-light-gary-background">
    <div class="container"> 
        <nav aria-label="breadcrumb">
          <ol class="fables-breadcrumb breadcrumb px-0 py-3"> 
              <li class="breadcrumb-item"><a href="index.html" class="fables-second-text-color">@lang('uboxfrontmodule::front.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('commonmodule::sidebar.jobs')</li>
            <li class="breadcrumb-item active" aria-current="page">@lang('uboxfrontmodule::front.job_details')</li>
          </ol>
        </nav> 
    </div>
</div>
<!-- /End Breadcrumbs -->
	
	
	<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container fables-counter">
					<div class="row justify-content-center d-flex dir-right">
						<div class="col-lg-8 post-list">
							<div class="single-post d-flex flex-row">
								<div class="thumb" style="{{ lang() == 'ar' ? 'margin-left:20px' : '' }}">
									<img src="{{ asset('upload/' . $job->image) }}" alt="">
								</div>
								<div class="details" style="width:100%">
                                        <div class="title d-flex flex-row justify-content-between">
                                            <div class="titles">
                                                    <a href="{{ route('only_job' , $job->id) }}"><h4>{{ $job->title }}</h4></a>				
                                                </div>
                                            <ul class="btns pull-right" style="float:right">
                                                <li><a href="">@lang('uboxfrontmodule::front.apply')</a></li>
                                            </ul>
                                        </div>
                                        <p>{{ $job->description }}</p>
                                        <h5>@lang('uboxfrontmodule::front.job_nature'): {{ $job->getAttributeType($job->type) }}</h5>
                                        <p class="address"><span class="lnr lnr-map"></span>@lang('uboxfrontmodule::front.address') : &nbsp;Shebin Elkom</p>
                                        
                                    </div>
                            </div>	
                            
							
							<div class="single-post job-experience" style="padding-bottom:50px">
								<h4 class="single-title">@lang('uboxfrontmodule::front.experience_requirements')</h4>
								<ul>
                                    @foreach ($job->skills as $skill)
                                        
									<li style="float:right;margin-right:30px;margin-bottom:30px">
                                        <div class="bg-blue"></div>
                                        {{ $skill->name }}
                                    </li>
                                    
                                    @endforeach																											
								</ul>
							</div>
							<div class="single-post job-experience">
								<h4 class="single-title">@lang('uboxfrontmodule::front.job_overviews')</h4>
								<ul>
									<li>
										<div class="bg-blue"></div>
                                        {{ $job->description }}
                                    </li>													
								</ul>
							</div>	
																				
						</div>
						
					</div>
				</div>	
			</section>
			<!-- End post Area -->


	

@stop