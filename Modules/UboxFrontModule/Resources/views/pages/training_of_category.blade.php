
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
                        <li><a>{{ $train->created_at->diffForHumans() }}</a></li>
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