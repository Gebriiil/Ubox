@forelse ($jobs as $job)

							<div class="single-post d-flex flex-row">
								<div class="thumb">
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

							{!! $jobs->links() !!}