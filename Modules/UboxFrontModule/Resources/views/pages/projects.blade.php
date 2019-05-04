@extends('uboxfrontmodule::layouts.master')

@section('content')

	<!-- Start Breadcrumbs -->
	<div class="fables-light-gary-background">
		<div class="container">
			<nav aria-label="breadcrumb">
				<ol class="fables-breadcrumb breadcrumb px-0 py-3">
					<li class="breadcrumb-item"><a href="index.html" class="fables-second-text-color">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Projects</li>
				</ol>
			</nav>
		</div>
	</div>
	<!-- /End Breadcrumbs -->

	<!-- Start page content -->
	<div class="container">
		<div class="row mt-3 mt-lg-5 mb-2">
			<div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
				<div class="text-center">
					<h2 class="fables-main-text-color font-35 bold-font my-3">Latest Works</h2>

				</div>
			</div>
		</div>

		<div class="gallery-filter">
			<div class="portfolioFilter mb-lg-5 clearfix">
				<a href="#" data-filter="*" class="current">ALL</a>
				@foreach($categories as $category)
					<a href="#" data-filter=".development" class="fables-forth-text-color">{{$category->name}}</a>
				@endforeach
			</div>
			<div class="portfolioContainer mt-4 my-lg-5 row">
				@foreach($categories as $category)
					@foreach($category->projects as $project)
						<div class="webDesign objects col-sm-6 col-md-3 mb-4">
							<div class="filter-img-block position-relative image-container translate-effect-right">
								<img src="{{$project->image_path()}}" alt="image">

								<div class="img-filter-overlay fables-main-color-transparent row m-0">
									<a href="" class="gallery-filter-icon white-color fables-second-hover-color"><span class="fables-iconlink"></span></a>
									<a  data-fancybox="gallery" href="{{$project->image_path()}}" class="gallery-filter-icon white-color fables-second-hover-color"><span class="fables-iconsearch-icon"></span></a>
								</div>
							</div>

						</div>
					@endforeach
				@endforeach
			</div>
		</div>
	</div>

	<!-- /End page content -->



@stop