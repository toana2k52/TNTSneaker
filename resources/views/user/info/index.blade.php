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
						<strong itemprop="title">Thông tin tài khoản</strong>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
</section>


<!-- Content -->
<h1 class="hidden"></h1>
<section class="cart-template">
	<div class="main-cart-page main-container col1-layout">
		<div class="main container ">
			<div class="col-main cart_desktop_page cart-page">
			</div>
		</div>
		<div class="cart-mobile container ">
			@if(Auth::guard('customer')->check())
				<div class="col-md-4 text-center">
  					<img width="90%;" height="auto" src="{{url('/')}}/resources/views/admin/member/uploads/{{Auth::guard('customer')->user()->image}}" alt="Ảnh đại diện" style="margin-top: 25px;">
  					
  				</div>	

  				<div class="col-md-8">
  					<div class="col-md-6">
  						<p style="font-size: 16px;"><span style="font-weight: bold;">Họ tên: </span>{{Auth::guard('customer')->user()->name}}</p>
  						<p style="font-size: 16px;"><span style="font-weight: bold;">Email: </span>{{Auth::guard('customer')->user()->email}}</p>
  					</div>
  					<div class="col-md-6">
						<p style="font-size: 16px;"><span style="font-weight: bold;">SDT: </span>{{Auth::guard('customer')->user()->phone}}</p>
	  					<p style="font-size: 16px;"><span style="font-weight: bold;">Địa chỉ: </span>{{Auth::guard('customer')->user()->address}}</p>
	  				</div>
  				<div class="col-md-12" style="padding: 0;">
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
  					<div class="panel panel-default">
	  					<div class="col-md-12">
	  						<div class="panel-heading col-md-6 text-left">Địa chỉ nhận hàng</div>
	  						<div class="panel-heading col-md-6 text-right"><a href="{{route('user.customer_add_address')}}" class="btn btn-success" style="padding: 5px;">Thêm mới</a></div>
	  					</div>
	  					<div class="panel-body" style="padding: 5px;">
		  					<table class="table table-hover" style="padding-top: 5px;">
		  						<thead>
		  							<tr>
		  								<th>Mã</th>
		  								<th>Họ tên</th>
		  								<th>Email</th>
		  								<th>SDT</th>
		  								<th>Địa chỉ</th>
		  								<th></th>
		  							</tr>
		  						</thead>
		  						<tbody>
		  							@foreach($customer_add as $cus_add)
		  							<tr>
		  								<td>{{$cus_add->id}}</td>
		  								<td>{{$cus_add->name}}</td>
		  								<td>{{$cus_add->email}}</td>
		  								<td>{{$cus_add->phone}}</td>
		  								<td>{{$cus_add->address}}</td>
		  								<td>
		  									<a href="{{route('user.customer_address-delete',['id'=>$cus_add->id]) }}" title="Xóa" class="btn btn-default btn-xs" onclick="return confirm('Bạn chắc chắn muốn xóa địa chỉ?')" style="padding: 5px;"><i class="fa fa-trash"></i></a>
											<a href="{{route('user.customer_address_edit',['id'=>$cus_add->id])}}" class="btn btn-default btn-xs" style="padding: 5px;" title="Sửa"><i class="fa fa-edit"></i></a>
										</td>
		  							</tr>
		  							@endforeach
		  						</tbody>
	  						</table>
	  					</div>
	  				</div>
  				</div>	
  				</div>
  				
  				<div class="col-md-12 text-right">
  					<a href="{{route('user.customer-reset-password-info')}}" class="btn btn-primary" title="Chỉnh sửa thông tin cá nhân" style="padding: 10px;">Đổi mật khẩu</a>
  					<a href="{{route('user.customer-edit-info')}}" class="btn btn-primary" title="Chỉnh sửa thông tin cá nhân" style="padding: 10px;">Chỉnh sửa thông tin cá nhân</a>
  				</div>
  				@endif
		</div>
	</div>
</section>
@stop()