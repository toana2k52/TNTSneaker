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
						<strong itemprop="title">Thêm mới địa chỉ nhận hàng</strong>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
</section>



<section class="cart-template">
	<div class="main-cart-page main-container col1-layout">
		<div class="cart-mobile container ">
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
			<div class="col-md-12">
				<form action="{{route('user.customer_address_add',['id'=>Auth::guard('customer')->user()->id,'check' => 2])}}" method="POST" class="form-horizontal" role="form">
					<div class="col-md-4">
						<div class="form-group">
							<label class="" for="">Họ tên</label>
							<input type="text" class="form-control" name="name" placeholder="">
							@if($errors->has('name'))
							<div class="text-danger">
								{{$errors->first('name')}}
							</div>
							@endif
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="" for="">Email</label>
							<input type="email" class="form-control" name="email" placeholder="">
							@if($errors->has('email'))
							<div class="text-danger">
								{{$errors->first('email')}}
							</div>
							@endif
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="" for="">Điện thoại</label>
							<input type="text" class="form-control" name="phone" placeholder="">
							@if($errors->has('phone'))
							<div class="text-danger">
								{{$errors->first('phone')}}
							</div>
							@endif
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label class="" for="" style="margin-top: 15px;">Địa chỉ</label>
							<textarea name="address" class="form-control"></textarea>
							@if($errors->has('address'))
							<div class="text-danger">
								{{$errors->first('address')}}
							</div>
							@endif
						</div>
					</div>
					@csrf
					<div class="form-group text-right">
						<button type="submit" class="btn btn-primary" style="padding: 5px; margin-right: 15px;">THÊM ĐỊA CHỈ</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@stop()