@push('javascript')
<script>
		$("#newsletters").click(function(){
			  var email=$('#mailnews').val();
			  $.post("{{route('newsletters')}}",
			  {
			    email: email,
			    _token:"{{ csrf_token() }}"
			  },
			  function(data){
			  	$('#mailnews').val('');
			    notif({
                        msg: "<b>Added Successfully</b>",
                        type: "success",
                    });
			  });
		});
</script>
@endpush
<!-- Start Footer 2 Background Image  -->
<div class="fables-footer-image fables-after-overlay white-color py-4 py-lg-5 bg-rules text-rtl">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 mt-2 mb-5 text-center">
				<h2 class="font-30 semi-font mb-5">@lang('uboxfrontmodule::front.Newsletter')</h2>
				<div class="form-inline position-relative">
					
					<div class="form-group fables-subscribe-formgroup">
						<input type="email" class="form-control fables-subscribe-input fables-btn-rouned text-rtl" id="mailnews" placeholder="@lang('uboxfrontmodule::front.email')">
					</div>
					<button  class="btn fables-second-background-color fables-btn-rouned fables-subscribe-btn" id="newsletters">@lang('uboxfrontmodule::front.subscribe')</button>
				</div>

			</div>
			<div class="col-12 col-lg-4 mb-4 mb-lg-0">
				<a href="#" class="fables-second-border-color border-bottom pb-3 d-block mb-3 mt-minus-13 text-rtl logo-footer"><img src="{{assets('assets/front/custom/images/logo.png')}}" alt="fables template"></a>
				<p class="font-15 fables-third-text-color">
					@lang('uboxfrontmodule::front.company')
				</p>

			</div>

			<div class="col-12 col-sm-6 col-lg-4">
				<h2 class="font-20 semi-font fables-second-border-color border-bottom pb-3 text-rtl">@lang('uboxfrontmodule::front.contact_us')</h2>
				<div class="my-3">
					<h4 class="font-16 semi-font"><span class="fables-iconmap-icon fables-second-text-color pr-2 font-20 mt-1 d-inline-block"></span> @lang('uboxfrontmodule::front.address')</h4>
					<p class="font-14 fables-fifth-text-color mt-2 ml-4">level13, 2Elizabeth St, Melbourne, Victor 2000</p>
				</div>
				<div class="my-3">
					<h4 class="font-16 semi-font"><span class="fables-iconphone fables-second-text-color pr-2 font-20 mt-1 d-inline-block"></span> @lang('uboxfrontmodule::front.call_now') </h4>
					<p class="font-14 fables-fifth-text-color mt-2 ml-4">+333 111 111 000</p>
				</div>
				<div class="my-3">
					<h4 class="font-16 semi-font"><span class="fables-iconemail fables-second-text-color pr-2 font-20 mt-1 d-inline-block"></span> @lang('uboxfrontmodule::front.mail') </h4>
					<p class="font-14 fables-fifth-text-color mt-2 ml-4">adminsupport@website.com</p>
				</div>
			</div>
			<div class="col-12 col-sm-6 col-lg-4">
				<h2 class="font-20 semi-font fables-second-border-color border-bottom pb-3 mb-3 text-rtl">@lang('uboxfrontmodule::front.explore')</h2>
				<ul class="nav fables-footer-links">
					<li><a href="about.html">@lang('uboxfrontmodule::front.about_us')</a></li>
					<li><a href="{{route('services')}}">@lang('uboxfrontmodule::front.services')</a></li>
					<li><a href="contact.html">@lang('uboxfrontmodule::front.contact_us')</a></li>
					<li><a href="{{route('blog')}}">@lang('commonmodule::sidebar.blog')</a></li>
				</ul>
			</div>

		</div>

	</div>
</div>
<div class="copyright fables-main-background-color mt-0 border-0 white-color">
	<ul class="nav fables-footer-social-links just-center fables-light-footer-links">
		<li><a href="#" target="_blank"><i class="fab fa-google-plus-square"></i></a></li>
		<li><a href="#" target="_blank"><i class="fab fa-facebook"></i></a></li>
		<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
		<li><a href="#" target="_blank"><i class="fab fa-pinterest-square"></i></a></li>
		<li><a href="#" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
		<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
	</ul>
	<p class="mb-0">Copyright © UBoxPlus 2018. All rights reserved.</p>

</div>
<!-- /End Footer 2 Background Image -->


