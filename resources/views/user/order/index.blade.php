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
						<strong itemprop="title">Đơn hàng</strong>
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
				<div class="header-cart" style="background:#fff;">
					
					<div class="title-cart">
						<h3>Đơn hàng của bạn - {{$order_sum}} đơn hàng</h3>
					</div>
					
				</div>
				<hr>
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
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Mã đơn</th>
							<th>Mã địa chỉ</th>
							<th>Họ tên</th>
							<th>Email</th>
							<th>SDT</th>
							<th>Địa chỉ</th>
							<th>SL</th>
							<th>Trạng thái</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					@foreach($order_all as $od)
						<tr @if($od->status == 3) style="background-color: #F08080;" @endif @if($od->status == 2) style="background-color:  #ADD8E6;" @endif >
							<td>{{$od->id}}</td>
							<td>{{$od->customer_address_id}}</td>
							<td>{{$od->user_name}}</td>
							<td>{{$od->user_email}}</td>
							<td>{{$od->user_phone}}</td>
							<td>{{$od->user_address}}</td>
							<td>{{$od->quantity}}</td>
							<td>
								@if($od->status == 0) Chờ xác nhận @endif
								@if($od->status == 1) Đang vận chuyển @endif
								@if($od->status == 2) Thanh toán thành công @endif
								@if($od->status == 3) Đã hủy @endif
							</td>
							<td>
								<a href="{{route('user.order_list_detail',['order_id'=>$od->id]) }}" class="btn btn-success" style="padding: 2.5px;"><i class="fa fa-edit"> Chi tiết</i></a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
		</div>
	</div>
</section>
@stop()