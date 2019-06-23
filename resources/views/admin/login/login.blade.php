<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin - Đăng nhập</title>
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
    <a href="{{route('login')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini glyphicon glyphicon-home" style="padding-top: 15px;"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
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
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="{{route('login')}}">
            <i class="glyphicon glyphicon-lock"></i> <span>Vui lòng đăng nhập <br><span style="padding-left: 25px;">để sử dụng sịch vụ !!!</span></span>
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
    </section>

    <!-- Main content -->

	<section class="content">
      <div class="box">
        <div class="box-header with-border">
        <h4>ĐĂNG NHẬP</h4>
          	<div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
	                    title="Collapse">
              	<i class="fa fa-minus"></i></button>
          	</div>
            @if(Session::has('error'))
                  <div class="text-danger">
                    <i class="glyphicon glyphicon-warning-sign"></i><span> {{Session::get('error')}}</span>
                  </div>
                @endif
        </div>
        <div class="box-body">
        	<div class="container-fluid col-md-4">
        		<form action="" method="POST" class="form-horizontal " role="form">
			        <div class="form-group @if($errors->has('email')) has-error @endif">
			            <label class="" for="">Email</label>
			            <input type="email" class="form-control" name="email" placeholder="">
			            @if($errors->has('email'))
                    <div class="">
                      <p style = "color: red;">{{$errors->first('email')}}</p>
                    </div>
                  @endif
			        </div>
			        <div class="form-group @if($errors->has('password')) has-error @endif">
			            <label class="" for="">Password</label>
			            <input type="password" class="form-control" name="password" placeholder="">
			            @if($errors->has('password'))
      							<div class="">
      								<p style = "color: red;">{{$errors->first('password')}}</p>
      							</div>
						      @endif
			        </div>
              <input type="checkbox" name="remember" value=""> Lưu tài khoản
			          @csrf
                
			        <div class="form-group text-center">
			            <button type="submit" class="btn btn-primary">LOGIN</button>
			        </div>
		      	</form>
        	</div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
    </section>
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
</body>
</html>
