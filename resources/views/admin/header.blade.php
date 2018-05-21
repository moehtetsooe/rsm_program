<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
  <meta charset="utf-8" />
  <title>Admin | Dashboard</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  
  <!-- ================== BEGIN BASE CSS STYLE ================== -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="{{asset('css/jquery-ui.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/style.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/style-responsive.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/theme/default.css')}}" rel="stylesheet" id="theme" />
  <!-- ================== END BASE CSS STYLE ================== -->
  
  <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
  <link href="{{asset('css/jquery-jvectormap/jquery-jvectormap.css')}}" rel="stylesheet" />
  
  <link href="{{asset('css/gritter/jquery.gritter.css')}}" rel="stylesheet" />
  <link href="{{asset('css/dataTables.bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/Responsive/css/responsive.bootstrap.min.css')}}" rel="stylesheet" />
  <!-- ================== END PAGE LEVEL STYLE ================== -->
  
  <!-- ================== BEGIN BASE JS ================== -->
  <script src="{{asset('js/pace/pace.min.js')}}"></script>
  <!-- ================== END BASE JS ================== -->
  @yield('css')
</head>
<body>
  <!-- begin #page-loader -->
  <div id="page-loader" class="fade in"><span class="spinner"></span></div>
  <!-- end #page-loader -->
  
  <!-- begin #page-container -->
  <div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <!-- begin #header -->
    <div id="header" class="header navbar navbar-default navbar-fixed-top">
      <!-- begin container-fluid -->
      <div class="container-fluid">
        <!-- begin mobile sidebar expand / collapse button -->
        <div class="navbar-header">
          <a href="{{asset('admin/home')}}" class="navbar-brand"><span class="navbar-logo"></span> Innov8te Admin</a>
          <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <!-- end mobile sidebar expand / collapse button -->
        
        <!-- begin header navigation right -->
        <ul class="nav navbar-nav navbar-right">
        
        
          <!-- <li>
            <form class="navbar-form full-width">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter keyword" />
                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
              </div>
            </form>
          </li> -->
          <!-- <li class="dropdown">
            <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
              <i class="fa fa-bell-o"></i>
              <span class="label">5</span>
            </a>
            <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                            <li class="dropdown-header">Notifications (5)</li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Server Error Reports</h6>
                                        <div class="text-muted f-s-11">3 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left">Img</div>
                                    <div class="media-body">
                                        <h6 class="media-heading">John Smith</h6>
                                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="text-muted f-s-11">25 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><img src="{{asset('images/user.png')}}" class="media-object" alt="Img" /></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Olivia</h6>
                                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="text-muted f-s-11">35 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-plus media-object bg-green"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New User Registered</h6>
                                        <div class="text-muted f-s-11">1 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-envelope media-object bg-blue"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New Email From John</h6>
                                        <div class="text-muted f-s-11">2 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-footer text-center">
                                <a href="javascript:;">View more</a>
                            </li>
            </ul>
          </li> -->
          <li class="dropdown navbar-user">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('images/user.png')}}" alt="Img" /> 
              <span class="hidden-xs">{{Auth::guard('admin')->user()->name}}</span> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu animated fadeInLeft">
              <li class="arrow"></li>
              <!-- <li><a href="javascript:;">Edit Profile</a></li>
              <li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
              <li><a href="javascript:;">Calendar</a></li>
              <li><a href="javascript:;">Setting</a></li>
              <li class="divider"></li> -->
              <!-- <li><a href="javascript:;">Log Out</a></li> -->
              <li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <span class="fa fa-power-off "></span>&nbsp; Logout
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>
            </li>
          </ul>
        </li>
      </ul>
      <!-- end header navigation right -->
    </div>
    <!-- end container-fluid -->
  </div>
  <!-- end #header -->

  <!-- begin #sidebar -->
  <div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
      <!-- begin sidebar user -->
      <ul class="nav">
        <li class="nav-profile">
          <div class="image">
            <a href="javascript:;"><img src="{{asset('images/user.png')}}" alt="Img" /></a>
          </div>
          
        </li>
      </ul>
      <!-- end sidebar user -->
      <!-- begin sidebar nav -->
      <ul class="nav">
        <li class="nav-header">Navigation</li>
        <li class="has-sub active">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-laptop"></i>
            <span>Dashboard</span>
          </a>
          @admin
          <ul class="sub-menu">
            <li class="active"><a href="{{asset('admin/user-lists')}}">Users</a></li>

          </ul>
          @endadmin
        </li>
        <li class="has-sub">
          <a href="javascript:;">
            <span class="badge pull-right">10</span>
            <i class="fa fa-inbox"></i> 
            <span>Email</span>
          </a>
          <ul class="sub-menu">
            <li><a href="#">Inbox v1</a></li>
            <li><a href="#">Inbox v2</a></li>
            <li><a href="#">Compose</a></li>
            <li><a href="#">Detail</a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-suitcase"></i>
            <span>UI Elements <span class="label label-theme m-l-5">NEW</span></span> 
          </a>
          <ul class="sub-menu">
            <li><a href="#">General</a></li>
            <li><a href="#">Typography</a></li>
            <li><a href="#">Tabs & Accordions</a></li>
            <li><a href="#">Unlimited Nav Tabs</a></li>
            <li><a href="#">Modal & Notification</a></li>
            <li><a href="#">Widget Boxes</a></li>
            <li><a href="#">Media Object</a></li>
            <li><a href="#">Buttons</a></li>
            <li><a href="#">Icons</a></li>
            <li><a href="#">Simple Line Icons</a></li>
            <li><a href="#">Ionicons</a></li>
            <li><a href="#">Tree View</a></li>
            <li><a href="#">Language Bar & Icon</a></li>
            <li><a href="#">Social Buttons<i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
            <li><a href="ui_tour.html">Intro JS<i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-file-o"></i>
            <span>Form Stuff <span class="label label-theme m-l-5">NEW</span></span> 
          </a>
          <ul class="sub-menu">
            <li><a href="#">Form Elements</a></li>
            <li><a href="#">Form Plugins <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
            <li><a href="#">Form Slider + Switcher</a></li>
            <li><a href="#">Form Validation</a></li>
            <li><a href="#">Wizards</a></li>
            <li><a href="#">Wizards + Validation</a></li>
            <li><a href="#">WYSIWYG</a></li>
            <li><a href="#">X-Editable</a></li>
            <li><a href="#">Multiple File Upload</a></li>
            <li><a href="#">Summernote <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
            <li><a href="#">Dropzone <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-th"></i>
            <span>Tables</span>
          </a>
          <ul class="sub-menu">
            <li><a href="#">Basic Tables</a></li>
            <li class="has-sub">
              <a href="#"><b class="caret pull-right"></b> Managed Tables</a>
              <ul class="sub-menu">
                <li><a href="#">Default</a></li>
                <li><a href="#">Autofill</a></li>
                <li><a href="#">Buttons</a></li>
                <li><a href="#">ColReorder</a></li>
                <li><a href="#">Fixed Column</a></li>
                <li><a href="#">Fixed Header</a></li>
                <li><a href="#">KeyTable</a></li>
                <li><a href="#">Responsive</a></li>
                <li><a href="#">RowReorder</a></li>
                <li><a href="#">Scroller</a></li>
                <li><a href="#">Select</a></li>
                <li><a href="#">Extension Combination</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-star"></i> 
            <span>Front End</span>
          </a>
          <ul class="sub-menu">
            <li><a href="#" target="_blank">One Page Parallax</a></li>
            <li><a href="#" target="_blank">Blog</a></li>
            <li><a href="#" target="_blank">Forum</a></li>
            <li><a href="#" target="_blank">E-Commerce</a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-envelope"></i>
            <span>Email Template</span>
          </a>
          <ul class="sub-menu">
            <li><a href="#">System Template</a></li>
            <li><a href="#">Newsletter Template</a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-area-chart"></i>
            <span>Chart</span>
          </a>
          <ul class="sub-menu">
            <li><a href="#">Flot Chart</a></li>
            <li><a href="#">Morris Chart</a></li>
            <li><a href="#">Chart JS</a></li>
            <li><a href="#">d3 Chart</a></li>
          </ul>
        </li>
        <li><a href="calendar.html"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-map-marker"></i>
            <span>Map</span>
          </a>
          <ul class="sub-menu">
            <li><a href="#">Vector Map</a></li>
            <li><a href="#">Google Map</a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-camera"></i>
            <span>Gallery</span>
          </a>
          <ul class="sub-menu">
            <li><a href="#">Gallery v1</a></li>
            <li><a href="#">Gallery v2</a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-cogs"></i>
            <span>Page Options</span>
          </a>
          <ul class="sub-menu">
            <li><a href="#">Blank Page</a></li>
            <li><a href="#">Page with Footer</a></li>
            <li><a href="#">Page without Sidebar</a></li>
            <li><a href="#">Page with Right Sidebar</a></li>
            <li><a href="#">Page with Minified Sidebar</a></li>
            <li><a href="#">Page with Two Sidebar</a></li>
            <li><a href="#">Page with Line Icons</a></li>
            <li><a href="#">Page with Ionicons</a></li>
            <li><a href="#">Full Height Content</a></li>
            <li><a href="#">Page with Wide Sidebar</a></li>
            <li><a href="#">Page with Light Sidebar</a></li>
            <li><a href="#">Page with Mega Menu</a></li>
            <li><a href="#">Page with Top Menu</a></li>
            <li><a href="#">Page with Boxed Layout</a></li>
            <li><a href="#">Page with Mixed Menu</a></li>
            <li><a href="#">Boxed Layout with Mixed Menu</a></li>
            <li><a href="#">Page with Transparent Sidebar</a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-gift"></i>
            <span>Extra</span>
          </a>
          <ul class="sub-menu">
            <li><a href="#">Timeline</a></li>
            <li><a href="#">Coming Soon Page</a></li>
            <li><a href="#">Search Results</a></li>
            <li><a href="#">Invoice</a></li>
            <li><a href="#">404 Error Page</a></li>
            <li><a href="#">Profile Page</a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-key"></i>
            <span>Login & Register</span>
          </a>
          <ul class="sub-menu">
            <li><a href="login.html">Login</a></li>
            <li><a href="#">Login v2</a></li>
            <li><a href="#">Login v3</a></li>
            <li><a href="#">Register v3</a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-cubes"></i>
            <span>Version <span class="label label-theme m-l-5">NEW</span></span>
          </a>
          <ul class="sub-menu">
            <li><a href="javascript:;">HTML</a></li>
            <li><a href="#">AJAX</a></li>
            <li><a href="#">ANGULAR JS</a></li>
            <li><a href="#">ANGULAR JS 2 <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
            <li><a href="#">MATERIAL DESIGN</a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-medkit"></i>
            <span>Helper</span>
          </a>
          <ul class="sub-menu">
            <li><a href="#">Predefined CSS Classes</a></li>
          </ul>
        </li>
        <li class="has-sub">
          <a href="javascript:;">
            <b class="caret pull-right"></b>
            <i class="fa fa-align-left"></i> 
            <span>Menu Level</span>
          </a>
          <ul class="sub-menu">
            <li class="has-sub">
              <a href="javascript:;">
                <b class="caret pull-right"></b>
                Menu 1.1
              </a>
              <ul class="sub-menu">
                <li class="has-sub">
                  <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    Menu 2.1
                  </a>
                  <ul class="sub-menu">
                    <li><a href="javascript:;">Menu 3.1</a></li>
                    <li><a href="javascript:;">Menu 3.2</a></li>
                  </ul>
                </li>
                <li><a href="javascript:;">Menu 2.2</a></li>
                <li><a href="javascript:;">Menu 2.3</a></li>
              </ul>
            </li>
            <li><a href="javascript:;">Menu 1.2</a></li>
            <li><a href="javascript:;">Menu 1.3</a></li>
          </ul>
        </li>
        <!-- begin sidebar minify button -->
        <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
        <!-- end sidebar minify button -->
      </ul>
      <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
  </div>
  <div class="sidebar-bg"></div>
  <!-- end #sidebar -->

  <!-- begin #content -->

  @yield('content')   

  <!-- end #content -->

  <!-- begin theme-panel -->
  <div class="theme-panel">
    <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
    <div class="theme-panel-content">
      <h5 class="m-t-0">Color Theme</h5>
                <!-- <ul class="theme-list clearfix">
                    <li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                    <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
                  </ul> -->
                  <div class="divider"></div>
                  <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Header Styling</div>
                    <div class="col-md-7">
                      <select name="header-styling" class="form-control input-sm">
                        <option value="1">default</option>
                        <option value="2">inverse</option>
                      </select>
                    </div>
                  </div>
                  <div class="row m-t-10">
                    <div class="col-md-5 control-label">Header</div>
                    <div class="col-md-7">
                      <select name="header-fixed" class="form-control input-sm">
                        <option value="1">fixed</option>
                        <option value="2">default</option>
                      </select>
                    </div>
                  </div>
                  <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Styling</div>
                    <div class="col-md-7">
                      <select name="sidebar-styling" class="form-control input-sm">
                        <option value="1">default</option>
                        <option value="2">grid</option>
                      </select>
                    </div>
                  </div>
                  <div class="row m-t-10">
                    <div class="col-md-5 control-label">Sidebar</div>
                    <div class="col-md-7">
                      <select name="sidebar-fixed" class="form-control input-sm">
                        <option value="1">fixed</option>
                        <option value="2">default</option>
                      </select>
                    </div>
                  </div>
                  <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Sidebar Gradient</div>
                    <div class="col-md-7">
                      <select name="content-gradient" class="form-control input-sm">
                        <option value="1">disabled</option>
                        <option value="2">enabled</option>
                      </select>
                    </div>
                  </div>
                  <div class="row m-t-10">
                    <div class="col-md-5 control-label double-line">Content Styling</div>
                    <div class="col-md-7">
                      <select name="content-styling" class="form-control input-sm">
                        <option value="1">default</option>
                        <option value="2">black</option>
                      </select>
                    </div>
                  </div>
                  <div class="row m-t-10">
                    <div class="col-md-12">
                      <a href="#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i class="fa fa-refresh m-r-3"></i> Reset Local Storage</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end theme-panel -->

              <!-- begin scroll to top btn -->
              <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
              <!-- end scroll to top btn -->
            </div>
            <!-- end page container -->

            <!-- ================== BEGIN BASE JS ================== -->
            <script src="{{asset('js/jquery/jquery-1.9.1.min.js')}}"></script>
            <script src="{{asset('js/jquery/jquery-migrate-1.1.0.min.js')}}"></script>
            <script src="{{asset('js/minified/jquery-ui.min.js')}}"></script>
            <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <!--[if lt IE 9]>
    <script src="assets/crossbrowserjs/html5shiv.js"></script>
    <script src="assets/crossbrowserjs/respond.min.js"></script>
    <script src="assets/crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    <script src="{{asset('js/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('js/jquery-cookie/jquery.cookie.js')}}"></script>
    <!-- ================== END BASE JS ================== -->


    <script src="{{asset('js/gritter/jquery.gritter.js')}}"></script>
    <script src="{{asset('js/flot/jquery.flot.min.js')}}"></script>
    <script src="{{asset('js/flot/jquery.flot.time.min.js')}}"></script>
    <script src="{{asset('js/flot/jquery.flot.resize.min.js')}}"></script>
    <script src="{{asset('js/flot/jquery.flot.pie.min.js')}}"></script>
    <script src="{{asset('js/sparkline/jquery.sparkline.js')}}"></script>
    <script src="{{asset('js/jquery-jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('js/jquery-jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> -->
    <script src="{{asset('js/dashboard.min.js')}}"></script>
    <script src="{{asset('js/apps.min.js')}}"></script>
    <script src="{{asset('js/DataTables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('js/table-manage-default.demo.min.js')}}"></script>
    <script src="{{asset('js/apps.min.js')}}"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    
    <script>
      $(document).ready(function() {
        App.init();
        Dashboard.init();

        $('.data-table').DataTable({});
      });
    </script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-53034621-1', 'auto');
      ga('send', 'pageview');

    </script>
    @yield('js')
  </body>
  </html>
