@extends('user.main.home')
@section('title','TNTSneaker - Website sneaker hàng đầu về chất lượng')
<!-- Header -->
@section('main-content')
<!-- Breadcrumb -->
		
		<section class="bread-crumb">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<ul class="breadcrumb" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">					
					<li class="home">
						<a href="{{route('user')}}" ><span itemprop="title">Trang chủ</span></a>					
					</li>

					
						<li>
							<strong itemprop="title">Đăng ký tài khoản</strong>
						</li>
					
				</ul>
			</div>
		</div>
	</div>
</section>
		

		<!-- Content -->
		<div class="customer-template">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="module-header">
					<h1 class="title-head layout-title">
						<span>Đăng ký tài khoản</span>
					</h1>
				</div>
				<div class="module-content">
					<h4 class="customer-heading">
						<span>Đã có tài khoản, đăng nhập <a href="{{route('user.login')}}">tại đây</a></span>
					</h4>
					<div class="customer-content">

						<form accept-charset='UTF-8' action="{{route('user.register')}}" id='customer_register' method='post' enctype="multipart/form-data">
							<input name='FormType' type='hidden' value='customer_register' />
							<input name='utf8' type='hidden' value='true' />
							<input type='hidden' id='Token' name='Token' />

						

							<div class="form-signup clearfix">
								<div class="row">
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<fieldset class="form-group">
											<input type="text" class="form-control form-control-lg" placeholder="Họ và tên" value="" name="name" id="firstName" required >
										</fieldset>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<fieldset class="form-group" id="staticParent">
											<input type="text" class="form-control form-control-lg" pattern="^[0-9]*$" placeholder="Số điện thoại" value="" name="phone" id="phoneNumber" required >
										</fieldset>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<fieldset class="form-group">
											<input type="email" class="form-control form-control-lg" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" placeholder="Email" value="" name="email" id="email"  required>
										</fieldset>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<fieldset class="form-group">
											<input type="text" class="form-control form-control-lg" placeholder="Địa chỉ" value="" name="address" id="firstName" required >
										</fieldset>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<fieldset class="form-group">
											<input type="password" class="form-control form-control-lg" placeholder="Mật khẩu" value="" name="password" required >
										</fieldset>
									</div>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<fieldset class="form-group">
											<input type="password" class="form-control form-control-lg" placeholder="Nhập lại mật khẩu" value="" name="confirm_password" required >
										</fieldset> 
									</div>
									<div class="col-xs-4 col-sm-2 col-md-2 col-lg-1 text-center">
											<p style="margin-top: 10px;">Hình ảnh: </p>

									</div>
									<div class="col-xs-8 col-sm-4 col-md-4 col-lg-5">
										<fieldset class="form-group">
											<input type="file" class="form-control form-control-lg" placeholder="" value="" name="image_pro" required >
										</fieldset>
									</div>
									@csrf
									<div class="text-right">
										<button type="summit" value="Đăng ký" class="btn btn_versus" style="margin-left: 15px;">
											<i class="fa fa-user-plus"></i>
											<span>Đăng ký ngay</span>
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(function() {
		$('#staticParent').on('keydown', '#phoneNumber', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
	})
</script>
@stop()