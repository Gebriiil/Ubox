@extends('frontmodule::layouts.master')

@section('content')
<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{route('home')}}">Home</a></li>
				<li class="active">Products</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">				
				<!-- MAIN -->
				<div id="main" class="col-md-12">
					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
							@foreach($videos as $video)
							<!-- Product Single -->
							<div class="col-md-4 col-sm-6 col-xs-6" style="margin-left: -60px;">
								<div class="product product-single">
									<div class="product-thum">
										<iframe  width="300" height="300" src="https://www.youtube.com/embed/{{$video->code}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
									</div>
								</div>
							</div>
							<!-- /Product Single -->
							@endforeach							
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

					
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
	@stop