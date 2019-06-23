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
						<strong itemprop="title">Đăng nhập tài khoản</strong>
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
						<span>Đăng nhập tài khoản</span>
					</h1>
				</div>
				<div class="module-content">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<h4 class="customer-heading">
								<span>Bạn chưa có tài khoản, vui lòng đăng ký <a href="{{route('user.register')}}">tại đây</a></span>
							</h4>
							<div class="customer-content">
								@if(Session::has('success'))
						          <div class="alert alert-success">
						            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						            {{Session::get('success')}}
						          </div>
						        @endif
						        @if(Session::has('error'))
						          <div class="alert alert-danger">
						            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						            {{Session::get('error')}}
						          </div>
						        @endif
								<form accept-charset='UTF-8' action="{{route('user.login')}}" id='customer_login' method='post'>
									<input name='FormType' type='hidden' value='customer_login' />
									<input name='utf8' type='hidden' value='true' />



									<div class="form-signup clearfix">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<fieldset class="form-group">
													<input type="email" class="form-control form-control-lg" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" value="" name="email" id="customer_email" placeholder="Email" required>
												@if($errors->has('email'))
								                    <div class="">
								                      <p style = "color: red;">{{$errors->first('email')}}</p>
								                    </div>
								                  @endif
												</fieldset>
												<fieldset class="form-group">
													<input type="password" class="form-control form-control-lg" value="" name="password" id="customer_password" placeholder="Mật khẩu" required>
												@if($errors->has('password'))
					      							<div class="">
					      								<p style = "color: red;">{{$errors->first('password')}}</p>
					      							</div>
											      @endif	
												</fieldset>
												<input type="checkbox" name="remember" value="" style="margin-bottom: 20px;"> Lưu tài khoản
			          							@csrf
											</div>
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 submit btn_action">
												<button type="summit" value="Đăng nhập" class="btn btn_versus">
													<i class="fa fa-sign-in"></i>
													<span>Đăng nhập</span>
												</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<h4 class="customer-heading">
								<span>Bạn quên mật khẩu, nhập email để lấy lại</span>
							</h4>
							<div class="customer-content">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<div class="form-signup clearfix">
											<form accept-charset='UTF-8' action='/account/recover' id='recover_customer_password' method='post'>
												<input name='FormType' type='hidden' value='recover_customer_password' />
												<input name='utf8' type='hidden' value='true' />

												<div class="form-signup clearfix">
													<fieldset class="form-group">
														<input type="email" class="form-control form-control-lg" value="" name="Email" id="recover-email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Nhập Email để lấy lại mật khẩu" required>
													</fieldset>
												</div>





												<div class="btn_action">
													<button type="summit" value="Lấy lại mật khẩu" class="btn btn_versus">
														<i class="fa fa-question-circle"></i>
														<span>Quên mật khẩu</span>
													</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop()