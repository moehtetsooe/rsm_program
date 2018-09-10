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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
  <!-- ================== END PAGE LEVEL STYLE ================== -->

  <!-- ================== START MULTISELECT STYLE ================== -->
  <link href="{{asset('rsm/css/multi-select.css')}}" rel="stylesheet" />
  <!-- <link href="{{asset('rsm/css/mdb.css')}}" rel="stylesheet" /> -->
  <!-- ================== MULTISELECT STYLE ================== -->
  
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
          <a href="{{asset('admin/home')}}" class="navbar-brand"><span class="navbar-logo"></span> R S M Admin</a>
          <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <!-- end mobile sidebar expand / collapse button -->
        
        <!-- begin header navigation right -->
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown navbar-user">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('images/user.png')}}" alt="Img" /> 
              <span class="hidden-xs">{{Auth::guard('admin')->user()->name}}</span> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu animated fadeInLeft">
              <li class="arrow"></li>
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
            <li class="active"><a href="{{asset('admin/user-lists')}}">Members</a></li>
            <li class=""><a href="{{asset('admin/role')}}">Role</a></li>
          </ul>
          @endadmin
          @php
            $member_id = Auth::guard('admin')->user()->id;
            $role = App\Role::where('roles.role','=',$member_id)->select('roles.role')->first();
            echo $role;
          @endphp
          @if($role->role == '2' || $role->role == '1')
          <li class="has-sub">
            <a href="javascript:;">
              <b class="caret pull-right"></b>
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>Team Leader Job</span>
            </a>
            <ul class="sub-menu">
              <li><a href="{{asset('admin/job-assign')}}">Job Assign Lists</a></li>
            </ul>
          </li>
          @endif
          @if($role->role == '3' || $role->role == '1')
          <li class="has-sub">
            <a href="javascript:;">
              <b class="caret pull-right"></b>
              <i class="fa fa-users" aria-hidden="true"></i>
              <span>Operator</span>
            </a>
            <ul class="sub-menu">
              <li><a href="{{asset('admin/operator')}}">Job Lists</a></li>
            </ul>
          </li>
          @endif
          @if($role->role == '4' || $role->role == '1')
          <li class="has-sub">
            <a href="javascript:;">
              <b class="caret pull-right"></b>
              <i class="fa fa-check-square-o" aria-hidden="true"></i>
              <span>Checker</span>
            </a>
            <ul class="sub-menu">
              <li><a href="{{asset('admin/checker')}}">Job Lists</a></li>
            </ul>
          </li>
        </li>
        @endif
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
    <!-- <script src="{{asset('js/jquery/jquery-1.9.1.min.js')}}"></script> -->
    <script src="{{asset('rsm/js/jquery.min.js')}}"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
    <script src="{{asset('js/jquery/jquery-migrate-1.1.0.min.js')}}"></script>
    <script src="{{asset('js/minified/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
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
    <script src="{{asset('js/dashboard.min.js')}}"></script>
    <script src="{{asset('js/apps.min.js')}}"></script>
    <script src="{{asset('js/DataTables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/DataTables/media/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/DataTables/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('js/table-manage-default.demo.min.js')}}"></script>
    <script src="{{asset('js/apps.min.js')}}"></script>
    <script src="{{asset('rsm/js/jquery.multi-select.js')}}"></script>
    <!-- <script src="{{asset('rsm/js/mdb.js')}}"></script> -->
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
    <script type="text/javascript">
        $(function() {
          $('#datetimepicker1').datetimepicker();
        });
    </script>
    <script type="text/javascript">
        $(function() {
          $('#datetimepicker2').datetimepicker();
        });
    </script>
    @yield('js')
  </body>
  </html>
