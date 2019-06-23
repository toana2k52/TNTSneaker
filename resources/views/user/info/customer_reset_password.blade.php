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
					<li class="home">
						<a href="{{route('user.customer_info')}}" ><span itemprop="title">Thông tin tài khoản</span></a>					
					</li>
					<li>
						<strong itemprop="title">Đổi mật khẩu</strong>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="cart-template">
	<div class="main-cart-page main-container col1-layout">
		<div class="cart-mobile container ">
			@if(Session::has('error'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				{{Session::get('error')}}
			</div>
			@endif
			<div class="col-md-12">
				<form accept-charset='UTF-8' action="{{route('user.customer-reset-password-info')}}" id='customer_register' method='post' enctype="multipart/form-data">
							<input name='FormType' type='hidden' value='customer_register' />
							<input name='utf8' type='hidden' value='true' />
							<input type='hidden' id='Token' name='Token' />
							<div class="form-signup clearfix">
								<div class="row">
									<div class="col-md-12">
										<div class="col-md-6" >
											<fieldset class="form-group">
												<input type="password" class="form-control form-control-lg" placeholder="Mật khẩu cũ" value="" name="old_password" required>
											</fieldset>
											@if($errors->has('old_password'))
	        									<div class="text-danger">
	        										{{$errors->first('old_password')}}
	        									</div>
	        								@endif
											<fieldset class="form-group">
												<input type="password" class="form-control form-control-lg" placeholder="Mật khẩu" value="" name="password" required>
											</fieldset>
											@if($errors->has('password'))
	        									<div class="text-danger">
	        										{{$errors->first('password')}}
	        									</div>
	        								@endif
											<fieldset class="form-group">
												<input type="password" class="form-control form-control-lg" placeholder="Nhập lại mật khẩu" value="" name="confirm_password" required>
											</fieldset>
											@if($errors->has('confirm_password'))
	        									<div class="text-danger">
	        										{{$errors->first('confirm_password')}}
	        									</div>
	        								@endif
										</div>
									</div>
									@csrf
									<div class="col-md-12">
										<div class="" style="margin: 0 auto;">
											<button type="summit" value="Đổi mật khẩu" class="btn btn_versus" style="margin-left: 15px;">
												<i class="fa fa-repeat" aria-hidden="true"></i>
												<span> Đổi mật khẩu</span>
											</button>
										</div>
									</div>
								</div>
							</div>
						</form>
			</div>
		</div>
	</div>
</section>
@stop()