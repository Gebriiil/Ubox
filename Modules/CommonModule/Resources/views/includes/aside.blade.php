<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            

            <!-- Common Module -->
            <li>
                <a href="{{aurl('/admin-panel')}}">
                    <i class="fa fa-home"></i> <span>{{__('commonmodule::sidebar.home')}} </span>
                    <span class="pull-right-container">
                </span>
                </a>
            </li>

            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-stack-exchange" aria-hidden="true"></i>--}}
            {{--<span>{{__('commonmodule::sidebar.store')}}</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<!-- Stock -->--}}
            {{--<li><a href="{{ aurl('admin-panel/store/stock') }}"><i--}}
            {{--class="fa fa-circle-o"></i> {{ __('commonmodule::sidebar.stock')}}</a></li>--}}

            {{--<!-- Reciete -->--}}
            {{--<li><a href="{{ aurl('/admin-panel/store/receipt') }}"><i--}}
            {{--class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.reciete')}}</a></li>--}}

            {{--</ul>--}}
            {{--</li>--}}

            {{-- Excel upload --}}
            {{--<li class="treeview">--}}
            {{--<a href="#">--}}
            {{--<i class="fa fa-file-excel-o" aria-hidden="true"></i> <span>{{__('commonmodule::sidebar.excelTitle')}}</span>--}}
            {{--<span class="pull-right-container">--}}
            {{--<i class="fa fa-angle-left pull-right"></i>--}}
            {{--</span>--}}
            {{--</a>--}}
            {{--<ul class="treeview-menu">--}}
            {{--<!-- products -->--}}
            {{--<li><a href="{{aurl('/admin-panel/excel-upload')}}"><i--}}
            {{--class="fa fa-circle-o"></i>{{__('commonmodule::sidebar.productexcel')}}</a></li>--}}

            {{--<!-- packages -->--}}
            {{--<li><a href="{{ aurl('admin-panel/package/excel-upload') }}"><i--}}
            {{--class="fa fa-circle-o"></i> {{__('commonmodule::sidebar.packageexcel')}}</a></li>--}}

            {{--</ul>--}}
            {{--</li>--}}

            
            <li class="treeview {{ active_menu('blog') }} ">
                <a href="#">
                    <i class="fa fa-qrcode" aria-hidden="true"></i> <span>{{__('commonmodule::sidebar.blog')}}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- Current -->
                    <li><a href="{{ aurl('blog') }}"><i
                                    class="fa fa-circle-o"></i>{{__('commonmodule::sidebar.blogs')}}</a></li>
                </ul>
            </li>

            <li class="treeview {{ active_menu('project') }} ">
                <a href="#">
                    <i class="fa fa-qrcode" aria-hidden="true"></i> <span>{{__('commonmodule::sidebar.projects')}}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i> 
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- Current -->
                    <li><a href="{{ aurl('project-categories/index') }}"><i 
                                    class="fa fa-circle-o"></i>{{__('commonmodule::sidebar.project_categories')}}</a></li>
                    <li><a href="{{ aurl('our-project/index') }}"><i
                                    class="fa fa-circle-o"></i>{{__('commonmodule::sidebar.projects')}}</a></li>
                </ul>
            </li>

            

            {{--Area--}}

            <li class="treeview {{ active_menu('config') }} ">
                <a href="">
                    <i class="fa fa-cog" aria-hidden="true"></i><span>{{__('commonmodule::sidebar.config')}} </span>
                    <span class="pull-right-container">
                                                <i class="fa fa-angle-left pull-right"></i>

                </span>
                </a>
                <ul class="treeview-menu">

                    <li>
                        <a href="{{ aurl('admin-panel/config-module') }}">
                            <i class="fa fa-cog"
                               aria-hidden="true"></i><span>{{__('commonmodule::sidebar.config')}} </span><span
                                    class="pull-right-container"></span>
                        </a>
                    </li>

                    <li><a href="{{ aurl('admin-panel/voucher') }}"><i
                                    class="fa fa-map"></i> {{__('commonmodule::sidebar.voucher')}}</a></li>    
                </ul>
            </li>

            


            <li>
                <a href="{{ aurl('admins') }}">
                    <i class="fa fa-user" aria-hidden="true"></i><span>{{__('commonmodule::sidebar.admins')}} </span>
                    <span class="pull-right-container">
                </span>
                </a>
            </li>

            <li class="treeview {{ active_menu('training') }} ">
                <a href="#">
                    <i class="fa fa-qrcode" aria-hidden="true"></i> <span>{{__('commonmodule::sidebar.training')}}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <!-- Current -->

                    <li>
                        <a href="{{ aurl('training-category/index') }}">
                            <i class="fa fa-circle-o"></i>{{__('commonmodule::sidebar.training_category')}}
                        </a>
                    </li>

                    <li>
                        <a href="{{ aurl('training/index') }}">
                            <i class="fa fa-circle-o"></i>{{__('commonmodule::sidebar.training')}}
                        </a>
                    </li>


                </ul>
            </li>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
