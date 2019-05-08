@extends('uboxfrontmodule::layouts.master')


@section('content')

@push('javascript')
		
	<script>

		$('.job_category').on('click' , function(e){
			
			e.preventDefault();

			category_id = $(this).attr('id');
			ajax(category_id , null);

		});
		
		$('.job_type').on('click' , function(e){
			
			e.preventDefault();
			type = $(this).data('type');
			ajax(null , type);
			
		});
	
	function ajax(category_id = '' , type = ''){

		$.ajax({
			url:"{{ url('/jobs') }}",
			data:{category_id , type},
			success:function(response){

				$('.our_jobs').html(response);

			}
		});
	

	}

	</script>
@endpush

<!-- Start Breadcrumbs -->
<div class="fables-light-gary-background">
    <div class="container"> 
        <nav aria-label="breadcrumb">
          <ol class="fables-breadcrumb breadcrumb px-0 py-3">
            <li class="breadcrumb-item"><a href="index.html" class="fables-second-text-color">@lang('uboxfrontmodule::front.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('commonmodule::sidebar.jobs')</li>
          </ol>
        </nav> 
    </div>
</div>
<!-- /End Breadcrumbs -->
	
	
	
	<!-- Start feature-cat Area -->
			<section class="feature-cat-area pt-100" id="category">
				<div class="container fables-counter">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">@lang('uboxfrontmodule::front.featured_job')</h1>
								<p style="color:#000">@lang('uboxfrontmodule::front.who_are_in_extremely')</p>
							</div>
						</div>
					</div>						
					<div class="row dir-right">
						@foreach ($categories as $category)
								
						<div class="col-lg-2 col-md-4 col-sm-6">
							<div class="single-fcat">
								<a id="{{ $category->id }}" class="job_category">
									<img src="{{ asset('upload/' . $category->image) }}" width="80px" height="80px" alt="">
								</a>
								<p>{{ $category->name }}</p>
							</div>			
						</div>	
						@endforeach

					</div>
				</div>	
			</section>
			<!-- End feature-cat Area -->
			
			<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container">
					<div class="row justify-content-center d-flex dir-right">
						<div class="col-lg-8 post-list">
							<ul class="cat-list">
								<li style="width:110px"><a class="job_type" data-type="recent" href="">Recent</a></li>
								<li style="width:110px"><a class="job_type" data-type="fulltime" href="">Full Time</a></li>
								<li style="width:110px"><a class="job_type" data-type="intern" href="">Intern</a></li>
								<li style="width:110px"><a class="job_type" data-type="parttime" href="">part Time</a></li>
							</ul>
							<div class="our_jobs">
								
							@forelse($jobs as $job)

							<div class="single-post d-flex flex-row">
								<div class="thumb" style="{{ lang() == 'ar' ? '    margin-left: 20px;' : ''}}">
									<img src="{{ asset('upload/' . $job->image)}}" alt="">
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
							
							@empty
								<div class="alert alert-danger text-center">@lang('uboxfrontmodule::front.is_empty')</div>
							@endforelse
							
						</div>
					
							
						</div>
						<div class="col-lg-4 sidebar">
							<div class="single-slidebar">
								<h4>@lang('uboxfrontmodule::front.jobs_by_location')</h4>
								<ul class="cat-list">
									<li><a class="justify-content-between d-flex" href="category.html"><p>Shebin</p></a></li>
								</ul>
							</div>


							<div class="single-slidebar">
									<h4>@lang('uboxfrontmodule::front.jobs_by_category')</h4>
								<ul class="cat-list">
									@foreach ($categories as $category)

										<li><a class="justify-content-between d-flex" href="category.html"><p>{{ $category->name }}</p><span>{{ $category->jobs()->count() }}</span></a></li>
									
									@endforeach
								</ul>
							</div>

												

						</div>
					</div>
				</div>	
			</section>
			<!-- End post Area -->
	
	
	


@stop