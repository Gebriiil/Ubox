@extends('uboxfrontmodule::layouts.master')

@section('content')

	<!-- Start Breadcrumbs -->
	<div class="fables-light-gary-background">
		<div class="container">
			<nav aria-label="breadcrumb">
				<ol class="fables-breadcrumb breadcrumb px-0 py-3">
					<li class="breadcrumb-item"><a href="index.html" class="fables-second-text-color">@lang('uboxfrontmodule::front.home')</a></li>
					<li class="breadcrumb-item active" aria-current="page">@lang('uboxfrontmodule::front.services')</li>
				</ol>
			</nav>
		</div>
	</div>
	<!-- /End Breadcrumbs -->


	<div class="inner-services">
		<div class="row">
			<div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 text-center">
				<h2 class="fables-second-text-color font-35 font-weight-bold my-3 mt-md-5 mb-md-4">@lang('uboxfrontmodule::front.Our Service')</h2>
				<p class="fables-forth-text-color">
					@lang('uboxfrontmodule::front.Our Service desc')
				</p>
			</div>
		</div>
		<!-- SERVICE  -->
		<section class="service section-block  fables-counter">
			<div class="container">
				<div class="row section-content">


					<div class="col-md-4 col-sm-6">
						<div class="icon-block"><i class="fa fa-cogs"></i></div>
						<h3>@lang('uboxfrontmodule::front.Web Development')</h3>
						<p>
							@lang('uboxfrontmodule::front.Web Development desc')
							
						</p>
					</div> <!-- .col-md-4 col-sm-6 ends -->

					<div class="col-md-4 col-sm-6">
						<div class="icon-block"><i class="fa fa-mobile" aria-hidden="true"></i></div>
						<h3>@lang('uboxfrontmodule::front.Mobile Application')</h3>
						<p>
							@lang('uboxfrontmodule::front.Mobile Application desc')
							
						</p>
					</div> <!-- .col-md-4 col-sm-6 ends -->

					<div class="col-md-4 col-sm-6">
						<div class="icon-block"><i class="fa fa-shopping-cart"></i></div>
						<h3>@lang('uboxfrontmodule::front.E-Marketing')</h3>
						<p>
							@lang('uboxfrontmodule::front.E-Marketing desc')
							
						</p>
					</div> <!-- .col-md-4 col-sm-6 ends -->

					<div class="col-md-4 col-sm-6">
						<div class="icon-block"><i class="fa fa-lightbulb"></i></div>
						<h3>@lang('uboxfrontmodule::front.Business Innovation Solution')</h3>
						<p>
							@lang('uboxfrontmodule::front.Business Innovation Solution desc')
							
						</p>
					</div> <!-- .col-md-4 col-sm-6 ends -->


				</div> <!-- .row section-content ends -->
			</div><!-- .container ends -->
		</section> <!-- .service ends -->
	</div>



@stop