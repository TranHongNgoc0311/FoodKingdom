
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | @yield('title')</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon shortcut" href="{{url('public/images/icons/admin.png')}}" type="x-icon/gif">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{url('public/fonts/font-awesome/css/font-awesome.css')}}" />
  <link rel="stylesheet" href="{{url('public/vendor/Ionicons/css/ionicons.min.css')}}" />
  <link rel="stylesheet" href="{{url('public/css/Backend/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{url('public/css/Backend/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{url('public/css/loading.css')}}">
  <link rel="stylesheet" href="{{url('public/vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="{{url('public/vendor/iCheck/all.css')}}">
  <link rel="stylesheet" href="{{url('public/fonts/font-awesome-4.7.0/css/font-awesome.css')}}" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  @yield('css')
  <script>
    var base_url = function () {
      return "{{url('')}}";
    };

    var akey = function (argument) {
      return "multiple_universer_from_earth1_move_to_earth2_with_name_HongTran0311_password_earth3";
    };
  </script>
</head>
@yield('style')
<style>
.fa-4{
  font-size: 5em;
}
.avatar{
  height: 100px!important;
}
.help-block{
  font-size: 12px;
  color: red;
}
.hiden-scroll::-webkit-scrollbar{
  display: none;
}
.hiden-scroll::-webkit-scrollbar{
  display: block;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice{color:#423B3B;}
</style>
<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="{{route('dashboard')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>F</b>kd</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Food</b> KingDom</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{url('public/images/users/'.Auth::user()->avatar)}}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{Auth::user()->name}}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  @if(!empty(Auth::user()->avatar))
                  <img src="{{url('public/images/users/'.Auth::user()->avatar)}}" class="img-circle" alt="User Image">
                  @else
                  <i class="fa fa-user-circle fa-4"></i>
                  @endif
                  <p>
                    {{Auth::user()->name}}
                    <small>{{Auth::user()->created_at}}</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-5 text-center">
                      <a href="">Mật khẩu</a>
                    </div>
                    <div class="col-xs-7 text-center">
                      <a href="">Cập nhật người dùng</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="" class="btn btn-info btn-flat">Người dùng <i class="fa fa-user"></i></a>
                  </div>
                  <div class="pull-right">
                    <a href="{{route('logout')}}" class="btn btn-primary btn-flat">Đăng xuất <i class="ion ion-log-out"></i></a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" onclick="">
          <div class="pull-left image">
           @if(!empty(Auth::user()->avatar))
           <img src="{{url('public/images/users/'.Auth::user()->avatar)}}" class="img-circle" alt="{{Auth::user()->name}}">
           @else
           <i class="fa fa-user-circle fa-4"></i>
           @endif
         </div>
         <div class="pull-left info">
          <p>{{Auth::user()->name}}</p>
          <i class="fa fa-user text-success"></i> Role
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">CHỨC NĂNG HỆ THỐNG CHÍNH</li>
        <li class="active">
          <a href="{{route('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span> Bảng điều khiển</span>
          </a>
        </li>
        <?php $menu = config('menu'); ?>
        @foreach($menu as $m)
        <li {{(!empty($m['sub']))? 'class=treeview' : '' }}>
          <a href="{{(route::has($m['route']))? route($m['route']) : '#'}}">
            <i class="fa {{$m['icon']}}"></i> <span> {{$m['name']}}</span>
            @if(!empty($m['sub']))
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            @endif
            @if($m['route'] == 'order.index')
            <span class="pull-right-container">
              <span class="label label-primary pull-right">{{$OrderCount}}</span>
            </span>
            @endif
          </a>
          @if(!empty($m['sub']))
          <ul class="treeview-menu">
            @foreach($m['sub'] as $sub)
            <!-- sửa {{(route::has($m['route']))? route($m['route']) : '#'}} -->
            <li>
              <a href="{{(route::has($sub['route']))? route($sub['route']) : '#'}}">
                <i class="fa fa-circle-o"></i> {{$sub['name']}}
              </a>
            </li>
            @endforeach
          </ul>
          @endif
        </li>
        @endforeach
        <li class="header">HỆ THỐNG</li>
        <li><a href=""><i class="fa fa-user text-aqua"></i> <span>Thông tin người dùng</span></a></li>
        <li><a href=""><i class="fa fa-cog text-yellow"></i> <span>Cập nhật thông tin</span></a></li>
        <li><a href=""><i class="fa fa-power-off text-red"></i> <span>Sign out</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('title')
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Bảng điều khiển</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- loading ảnh gif -->
        <!-- <div class="load">
          <img src="loader.gif">
        </div> -->
        <div class="loader">
          <!-- <span class="fas fa-spinner xoay icon"></span> -->
          <!-- Hơi dài magic -->
          <div class='loading'>
            <div class='loading__square'></div>
            <div class='loading__square'></div>
            <div class='loading__square'></div>
            <div class='loading__square'></div>
            <div class='loading__square'></div>
            <div class='loading__square'></div>
            <div class='loading__square'></div>
          </div>
        </div>
        <div class="content">
          @if(Session::has('success'))
          <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Thành công!</strong> {{Session::get('success')}}
          </div>
          @endif
          @if(Session::has('error'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Gặp lỗi!</strong> {{Session::get('error')}}
          </div>
          @endif
          @yield('content')
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; 2019 <a href="#">HongTran</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-user bg-yellow"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                  <p>New phone +1(800)555-1234</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                  <p>nora@example.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="label label-danger pull-right">70%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Update Resume
                  <span class="label label-success pull-right">95%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Laravel Integration
                  <span class="label label-warning pull-right">50%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Back End Framework
                  <span class="label label-primary pull-right">68%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Some information about this general settings option
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Other sets of options are available
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Allow the user to show his name in blog posts
              </p>
            </div>
            <!-- /.form-group -->

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div>
            <!-- /.form-group -->
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!-- jQuery 3 -->
 <script src="//code.jquery.com/jquery.js"></script>
 <!-- Bootstrap 3.3.7 -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <!-- SlimScroll -->
 <script src="{{url('public/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
 <!-- FastClick -->
 <script src="{{url('public/vendor/fastclick/lib/fastclick.js')}}"></script>
 <!-- Bootstrap WYSIHTML5 -->
 <script src="{{url('public/vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
 <!-- Sparkline -->
 <script src="{{url('public/vendor/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
 <!-- iCheck -->
 <script src="{{url('public/vendor/iCheck/icheck.min.js')}}"></script>
 <!-- Chart -->
 <script src="{{url('public/vendor/raphael/raphael.min.js')}}"></script>
 <script src="{{url('public/vendor/morris.js/morris.min.js')}}"></script>
 <script src="{{url('public/vendor/chart.js/Chart.js')}}"></script>
 <!-- AdminLTE App -->
 <script src="{{url('public/js/Backend/adminlte.min.js')}}"></script>
 <script src="{{url('public/js/Backend/setting.js')}}"></script>
 <script src="{{url('public/js/loading.js')}}"></script>
 @yield('js')
</body>
</html>
