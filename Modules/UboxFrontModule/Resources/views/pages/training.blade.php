@extends('uboxfrontmodule::layouts.master')

@section('content')

<!-- Start Breadcrumbs -->
<div class="fables-light-gary-background">
    <div class="container"> 
        <nav aria-label="breadcrumb">
          <ol class="fables-breadcrumb breadcrumb px-0 py-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="fables-second-text-color">@lang('uboxfrontmodule::front.home')</a></li>
			  <li class="breadcrumb-item"><a href="job.html" class="fables-second-text-color">@lang('commonmodule::sidebar.training')</a></li>
          </ol>
        </nav> 
    </div>
</div>
<!-- /End Breadcrumbs -->
	
	
	<!-- Start post Area -->
			<section class="post-area section-gap">
				<div class="container fables-counter">
					<div class="row justify-content-center d-flex dir-right">
						@foreach($training as $train)

						<div class="col-lg-10 post-list">
							<div class="single-post d-flex flex-row">
								<div class="thumb">
									<img src="{{ asset('upload/' . $train->image) }}" alt="">
								</div>
								<div class="details" style="width:100%">
									<div class="title d-flex flex-row justify-content-between" style="width:100%">
										<div class="titles">
											<a href="#"><h4>{{ $train->name }}</h4></a>
										</div>
										<ul class="btns pull-right" style="float:right">
											<li><a href="applyjob.html">Apply</a></li>
										</ul>
									</div>
									<p style="color:#000">
										{{ $train->desc }}
									</p>
									
								</div>
							</div>	
						</div>
						@endforeach 
						<div class="col-lg-4 sidebar">
							
							{!! $training->links() !!}
							
						</div>
					</div>
				</div>	
			</section>
			<!-- End post Area -->


@stop