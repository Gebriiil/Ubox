@extends('frontmodule::layouts.master')

@section('content')
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="{{route('home')}}">Home</a></li>
				<li class="active">Blog</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->
	
	
	 <div class="content-blog">
	   <div class="container">
		   <div class="row">
		     <div class="col-md-9 col-sm-12 col-xs-12 dir-right">
		     	@foreach($blogs as $blog)
			     <div class="row block-blog">
				    <div class="col-md-6 col-sm-12 col-xs-12 dir-right"><img src="{{asset('public/images/blog/' . $blog->photo)}}"></div>
					 <div class="col-md-6 col-sm-12 col-xs-12">
					   
						<a data-toggle="modal" data-target="#myModal"  data-=""><h4>{{$blog->title}}</h4></a> 
						
						<p>{!!$blog->description!!}</p> 
					 </div>
				 </div>
				 @endforeach
				  
	
			   </div>
			 <div class="col-md-3 col-sm-12 col-xs-12 ">
			     <div class="side-blog">
					 <h4>Recent Blog</h4>
				   <div class="row bottom">
					   <div class="col-md-6 col-sm-6 col-xs-6 dir-right"><img src="{{asset('public/img/beef1.jpg')}}"></div>
					   <div class="col-md-6 col-sm-6 col-xs-6 detail-side">
					     <h7>25 Dec 2018</h7>
						  <p>0 hits</p> 
					   </div>
					 </div>
					    <div class="row bottom">
					   <div class="col-md-6 col-sm-6 col-xs-6 dir-right"><img src="{{asset('public/img/beef4.jpg')}}"></div>
					   <div class="col-md-6 col-sm-6 col-xs-6 detail-side">
					     <h7>25 Dec 2018</h7>
						  <p>0 hits</p> 
					   </div>
					 </div>
					    <div class="row bottom">
					   <div class="col-md-6 col-sm-6 col-xs-6 dir-right"><img src="{{asset('public/img/special1.jpg')}}"></div>
					   <div class="col-md-6 col-sm-6 col-xs-6 detail-side">
					     <h7>25 Dec 2018</h7>
						  <p>0 hits</p> 
					   </div>
					 </div>
					    <div class="row bottom">
					   <div class="col-md-6 col-sm-6 col-xs-6 dir-right"><img src="{{asset('public/img/special2.jpg')}}"></div>
					   <div class="col-md-6 col-sm-6 col-xs-6 detail-side">
					     <h7>25 Dec 2018</h7>
						  <p>0 hits</p> 
					   </div>
					 </div>
				 </div>
				  <div class="side-blog">
					 <h4>Popular Blog</h4>
				   <div class="row bottom">
					   <div class="col-md-6 col-sm-6 col-xs-6 dir-right"><img src="{{asset('public/img/fruit1.jpg')}}"></div>
					   <div class="col-md-6 col-sm-6 col-xs-6 detail-side">
					     <h7>25 Dec 2018</h7>
						  <p>0 hits</p> 
					   </div>
					 </div>
					  <p>it look like readable English. Many desktop publishing text.</p>
					    <div class="row bottom">
					   <div class="col-md-6 col-sm-6 col-xs-6 dir-right"><img src="{{asset('public/img/flfl.jpg')}}"></div>
					   <div class="col-md-6 col-sm-6 col-xs-6 detail-side">
					     <h7>25 Dec 2018</h7>
						  <p>0 hits</p> 
					   </div>
					 </div>
					  <p>it look like readable English. Many desktop publishing text.</p>
					    <div class="row bottom">
					   <div class="col-md-6 col-sm-6 col-xs-6 dir-right"><img src="{{asset('public/img/gzar.jpg')}}"></div>
					   <div class="col-md-6 col-sm-6 col-xs-6 detail-side">
					     <h7>25 Dec 2018</h7>
						  <p>0 hits</p> 
					   </div>
					 </div>
					  <p>it look like readable English. Many desktop publishing text.</p>
					    <div class="row bottom">
					   <div class="col-md-6 col-sm-6 col-xs-6 dir-right"><img src="{{asset('public/img/lamon.jpg')}}"></div>
					   <div class="col-md-6 col-sm-6 col-xs-6 detail-side">
					     <h7>25 Dec 2018</h7>
						  <p>0 hits</p> 
					   </div>
					 </div>
					  <p>it look like readable English. Many desktop publishing text.</p>
				 </div>
			   </div>   
		   </div>
		 </div>
	</div>


	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="padding: 50px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">@lang('frontmodule::front.Fruits and vegetables')</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@push('javascript')
<script>
	
$('#myModal').on('show.bs.modal', function (event) {
          
  var button = $(event.relatedTarget); 
  var msg = button.data('mm'); 
  


  var modal = $(this);
  modal.find('.modal-body').text(msg);
  
})

</script>
@endpush
	@stop
