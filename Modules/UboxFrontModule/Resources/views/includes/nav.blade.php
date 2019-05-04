
<div class="search-section">
    <a class="close-search" href="#"></a>
    <div class="d-flex justify-content-center align-items-center h-100">
        <form method="post" action="#" class="w-50">
            <div class="row">
                <div class="col-10">
                    <input type="search" value="" class="form-control palce bg-transparent border-0 search-input" placeholder="Search Here ..." />
                </div>
                <div class="col-2 mt-3">
                    <button type="submit" class="btn bg-transparent text-white"> <i class="fas fa-search"></i> </button>
                </div>
            </div>
        </form>
    </div>

</div>

<!-- Loading Screen -->
<div id="ju-loading-screen">
    <div class="sk-double-bounce">
        <div class="sk-child sk-double-bounce1"></div>
        <div class="sk-child sk-double-bounce2"></div>
    </div>
</div>
<!-- Start Top Header -->
<div class="fables-forth-background-color fables-top-header-signin">
    <div class="container">
        <div class="row" id="top-row">
            <div class="col-12 col-sm-2 col-lg-5 text-rtl">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle border-0 bg-transparent font-13 lang-dropdown-btn pl-0" type="button" id="dropdownLangButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        language
                    </button>
                    <div class="dropdown-menu p-0 fables-forth-background-color rounded-0 m-0 border-0 lang-dropdown" aria-labelledby="dropdownLangButton">

                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                            <a class="dropdown-item white-color font-13 fables-second-hover-color" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>

                        @endforeach

                    </div>
                </div>

            </div>
            <div class="col-12 col-sm-5 col-lg-4 text-rtl">
                <p class="fables-third-text-color font-13"><span class="fables-iconphone fl-right"></span> Phone :  (888) 6000 6000 - (888) 6000 6000</p>
            </div>
            <div class="col-12 col-sm-5 col-lg-3 text-rtl">
                <p class="fables-third-text-color font-13"><span class="fables-iconemail fl-right"></span> Email: Design@domain.com</p>
            </div>

        </div>
    </div>
</div>
<!-- /End Top Header -->

<!-- Start Fables Navigation -->
<div class="fables-navigation fables-main-background-color py-3 py-lg-0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 col-lg-9 pr-md-0">
                <nav class="navbar navbar-expand-md btco-hover-menu py-lg-2">

                    <a class="navbar-brand fables-logo-brand pl-0" href="index.html">
                        <img src="{{assets('assets/front/custom/images/logo.png')}}" alt="Fables Template" class="fables-logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fablesNavDropdown" aria-controls="fablesNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fables-iconmenu-icon text-white font-16"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="fablesNavDropdown">

                        <ul class="navbar-nav mx-auto fables-nav">
                            <li class="nav-item active">
                                <a class="nav-link " href="{{route('home')}}">@lang('uboxfrontmodule::front.home')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('services')}}">@lang('uboxfrontmodule::front.services')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('projects')}}">@lang('uboxfrontmodule::front.projects')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="{{route('blog')}}">@lang('uboxfrontmodule::front.blog')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('about_us')}}">@lang('uboxfrontmodule::front.about_us')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('contact_us')}}">@lang('uboxfrontmodule::front.contact_us')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="job.html">@lang('uboxfrontmodule::front.jobs')</a>
                            </li>

                        </ul>

                    </div>
                </nav>
            </div>

            <div class="col-5 col-md-2 pr-md-0 icons-header-mobile">

                <div class="fables-header-icons pt-lg-4 text-rtl">

                    <a href="#" class="open-search fables-third-text-color fables-mega-menu-btn px-4  fables-second-hover-color">
                        <span class="fables-iconsearch-icon"></span>
                    </a>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- /End Fables Navigation -->

