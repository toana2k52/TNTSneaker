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
						<h3>Chi tiết đơn hàng</h3>
					</div>
					
				</div>
				<hr>
				<div class="clearfix">
        			<div class="col-md-4">
        				<legend>Chi tiết khách hàng</legend>
        				<p><span style="font-weight: bold;">Mã đơn hàng: </span>{{$order->id}}</p>
        				<p><span style="font-weight: bold;">Họ tên: </span>{{$order->cust->name}}</p>
        				<p><span style="font-weight: bold;">Email: </span>{{$order->cust->email}}</p>
        				<p><span style="font-weight: bold;">Phone: </span>{{$order->cust->phone}}</p>
        				<p><span style="font-weight: bold;">Address: </span>{{$order->cust->address}}</p>
        			</div>
        			<div class="col-md-4">
        				<legend>Chi tiết nhận hàng - thanh toán</legend>
        				<p><span style="font-weight: bold;">Mã địa chỉ: </span>{{$customer_add->id}}</p>
        				<p><span style="font-weight: bold;">Họ tên: </span>{{$customer_add->name}}</p>
        				<p><span style="font-weight: bold;">Email: </span>{{$customer_add->email}}</p>
        				<p><span style="font-weight: bold;">Phone: </span>{{$customer_add->phone}}</p>
        				<p><span style="font-weight: bold;">Address: </span>{{$customer_add->address}}</p>
        			</div>
        			<div class="col-md-4">
        				<legend>Trạng thái</legend>
        				<div class="" for="">
							@if($order->status == 0) <p style="color: green; font-size: 18px;font-weight: bold;">Chờ xác nhận</p> @endif
							@if($order->status == 1) <p style="color: yellow; font-size: 18px;font-weight: bold;">Đang vận chuyển</p> @endif
							@if($order->status == 2) <p style="color: brown; font-size: 18px;font-weight: bold;">Thanh toán thành công</p> @endif
							@if($order->status == 3) <p style="color: red; font-size: 18px;font-weight: bold;">Đã hủy</p>
							<p><span style="font-weight: bold;">Lý do: </span>{{$order->note}}</p> @endif
        				</div>
        				<div class="text-right">
        					@if($order->status == 0)
        					<a href="{{route('user.order_list_detail_edit',['id' => $order->id])}}" class="btn btn-danger" style="padding: 10px;">Huỷ đơn hàng</a>
        					@endif
        				</div>
        			</div>
        		</div>
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
		        <hr>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Mã sản phẩm</th>
							<th>Tên sản phẩm</th>
							<th>Size</th>
							<th>Màu sắc</th>
							<th>Giá</th>
							<th>SL</th>
							<th>Thành tiền</th>
						</tr>
					</thead>
					<tbody>
					@foreach($order_detail as $od)
						<tr>
							<td>{{$od->product_detail_id}}</td>
							<td>{{$od->product_name}}</td>
							<td>{{$od->pro_detail->size}}</td>
							<td>{{$od->pro_detail->color}}</td>
							<td>{{$od->price}}</td>
							<td>{{$od->quantity}}</td>
							<?php $price_of_pro = ($od->price)*($od->quantity) ?>
							<td>{{$price_of_pro}}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div class="clearfix">
					
				</div>
        	</div>
		</div>
	</div>
</section>
@stop()