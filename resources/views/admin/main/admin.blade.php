<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin - @yield('title')</title>
  <link rel="icon" href="{{url('/')}}/public/images/logo_icon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{url('/')}}/public/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{url('/')}}/public/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{url('/')}}/public/css/AdminLTE.css">
  <link rel="stylesheet" href="{{url('/')}}/public/css/_all-skins.min.css">
  <link rel="stylesheet" href="{{url('/')}}/public/css/jquery-ui.css">
  <link rel="stylesheet" href="{{url('/')}}/public/css/style.css" />
  <script src="{{url('/')}}/public/js/angular.min.js"></script>
  <script src="{{url('/')}}/public/js/app.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="{{route('admin')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini glyphicon glyphicon-home" style="padding-top: 15px;"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="user-image glyphicon glyphicon-user" ></span>
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{url('/')}}/resources/views/admin/member/uploads/{{Auth::user()->image}}" class="img-circle" alt="User Image">

                <p>
                  {{Auth::user()->name}}
                  <small>{{Auth::user()->email}}- {{Auth::user()->phone}}</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('reset_password')}}" class="btn btn-default btn-flat">Đổi mật khẩu</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('logout')}}" class="btn btn-default btn-flat">Đăng xuất</a>
                </div>
              </li>
            </ul>
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
      <!-- <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div> -->

      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
     
      <ul class="sidebar-menu" data-widget="tree">
         <li class="active">
          <a href="{{route('admin')}}">
            <i class="glyphicon glyphicon-home"></i> <span>Trang chủ</span>
          </a>
        </li>

        <li>
          <a href="{{route('admin.category')}}">
            <i class="glyphicon glyphicon-th-list"></i> <span>Danh mục</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-cube"></i> <span>Sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('admin.product-add')}}"><i class="fa fa-circle-o text-blue"></i> Thêm mới sản phẩm </a></li>
            <li><a href="{{route('admin.product',['id'=>1])}}"><i class="fa fa-circle-o text-blue"></i> Danh sách sản phẩm </a></li>
          </ul>
        </li>

        <li>
          <a href="{{route('admin.customer')}}">
            <i class="fa fa-user-o"></i> <span>Khách hàng</span>
          </a>
        </li>
        
        <li>
          <a href="{{route('admin.brands')}}">
            <i class="glyphicon glyphicon-briefcase"></i> <span>Thương hiệu</span>
          </a>
        </li>
        
        <li>
          <a href="{{route('admin.order')}}">
            <i class="fa fa-file-text-o"></i> <span>Quản lý đơn hàng</span>
          </a>
        </li>
        
        <li>
          <a href="">
            <i class="fa fa-comments-o"></i> <span>Phản hồi khách hàng</span>
          </a>
        </li>

        <li>
          <a href="{{route('admin.member')}}">
            <i class="fa fa-users"></i> <span>Nhân viên</span>
          </a>
        </li>

        <li>
          <a href="{{route('admin.info')}}">
            <i class="fa fa-address-card-o"></i> <span>Cá nhân</span>
          </a>
        </li>

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
        @yield('box-title')
      </h1>
      
    </section>

    <!-- Main content -->
      @yield('main-content')
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>D.H.T Admin</b> 1.0.0
    </div>
    <strong>TNT Sneaker &copy; {{date('Y')}} <a href="{{route('user')}}">TNTSneaker.net </a>-</strong> website giày sneaker hàng đầu.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

<script src="{{url('/')}}/public/js/jquery.min.js"></script>
<script src="{{url('/')}}/public/js/jquery-ui.js"></script>
<script src="{{url('/')}}/public/js/bootstrap.min.js"></script>
<script src="{{url('/')}}/public/js/adminlte.min.js"></script>
<script src="{{url('/')}}/public/js/dashboard.js"></script>
<script src="{{url('/')}}/public/tinymce/tinymce.min.js"></script>
<script src="{{url('/')}}/public/tinymce/config.js"></script>
<script src="{{url('/')}}/public/js/function.js"></script>
<script type="text/javascript" src="{{url('/')}}/public/js/app.js"></script>
</body>
</html>
