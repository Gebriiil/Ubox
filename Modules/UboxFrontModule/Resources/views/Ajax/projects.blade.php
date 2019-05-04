
@foreach($projects as $project)
<div class="webDesign food col-sm-6 col-md-3 mb-4">
      <div class="filter-img-block position-relative image-container translate-effect-right">
          <img src="{{asset('upload/' . $project->image)}}" alt="image">
{{$project->name}}
          <div class="img-filter-overlay fables-main-color-transparent row m-0">
              <a href="#" class="gallery-filter-icon white-color fables-second-hover-color"><span class="fables-iconlink"></span></a>
              <a  data-fancybox="gallery" href="{{assets('upload/' . $project->image)}}" class="gallery-filter-icon white-color fables-second-hover-color"><span class="fables-iconsearch-icon"></span></a>
          </div>
      </div>

  </div>
 @endforeach