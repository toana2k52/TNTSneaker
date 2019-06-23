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
						<strong itemprop="title">Giỏ hàng</strong>
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
						<h3>Giỏ hàng của bạn</h3>
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
				@if(Auth::guard('customer')->check())
				@if($cart_check != 0)
				<div class="header-cart-content" style="background:#fff;">
					<div class="col-main cart_desktop_page cart-page">
						<div class="cart page_cart ">
								<div class="bg-scroll">
									<div class="cart-thead">
										<div style="width: 17%">Ảnh sản phẩm</div>
										<div style="width: 33%">
											<span class="nobr">Tên sản phẩm</span>
										</div>
										<div style="width: 15%" class="a-center">
											<span class="nobr">Đơn giá</span>
										</div>
										<div style="width: 14%" class="a-center">Số lượng</div>
										<div style="width: 15%" class="a-center">Thành tiền</div>
										<div style="width: 6%">Xoá</div>
									</div>
									<div class="cart-tbody">
										@foreach($cart_of_cus as $cart_of_c)
										<div class="item-cart">
											<div style="width: 17%" class="image dp-flex">
												<a class="product-image" title="{{$cart_of_c->pro_cart->name}} - {{$cart_of_c->pro_cart_detail->size}} / {{$cart_of_c->pro_cart_detail->color}}" href="{{route('user.product-detail',['slug'=>$cart_of_c->pro_cart->slug,'id'=>$cart_of_c->product_detail_id])}}">
													<img alt="{{$cart_of_c->pro_cart->name}} - {{$cart_of_c->pro_cart_detail->size}} / {{$cart_of_c->pro_cart_detail->color}}" src="{{url('/')}}/resources/views/admin/product/uploads/{{$cart_of_c->pro_cart_detail->image}}">
												</a>
											</div>
											<div style="width: 33%;" class="a-center dp-flex">
												<h3 class="product-name text3line" title="{{$cart_of_c->pro_cart->name}}">
													<a href="{{route('user.product-detail',['slug'=>$cart_of_c->pro_cart->slug,'id'=>$cart_of_c->product_detail_id])}}">{{$cart_of_c->pro_cart->name}}</a>
												</h3><span class="variant-title">{{$cart_of_c->pro_cart_detail->size}} / {{$cart_of_c->pro_cart_detail->color}}</span>
											</div>
											<div style="width: 15%" class="a-center">
												<span class="item-price">
													<span class="price">{{number_format($cart_of_c->price)}}</span>
												</span>
											</div>
											<div style="width: 14%" class="a-center dp-flex">
												<div class="input_qty_pr">
													<form action="{{route('user.cart_update_quantity',['id' => $cart_of_c->id])}}" method="POST" class="form-inline" role="form">
																<div class="col-md-8" style="padding: 0;">
																<div class="form-group">
																	<input type="number" name="quantity" style="width: 100%;height: 30px;padding: 5px 5px 5px 40px;" value="{{$cart_of_c->quantity}}">
																</div>
															</div>
															@csrf
																<div class="form-group">
																	<div class="col-md-4 text-left" style="padding-right: 15px; padding-left: 0px; padding-top: 2.5px;">
																		<button type="submit" class="btn"><i class="fa fa-refresh" aria-hidden="true" style="padding: 5px; "></i></button>
																	</div>
																</div>
														</form>
												</div>
											</div>
											<?php $tt = $cart_of_c->price*$cart_of_c->quantity ?>
											<div style="width: 15%" class="a-center">
												<span class="cart-price">
													<span class="price">{{number_format($tt)}}</span>
												</span>
											</div>
											<div style="width: 6%">
												<a class="button remove-item remove-item-cart" title="Xóa" href="{{route('user.cart_delete',['id'=>$cart_of_c->id])}}" onclick="return confirm('Xóa sản phẩm khỏi giỏ hàng?')">
													<span><span>Xóa</span></span>
												</a>
											</div>
										</div>
										@endforeach
									</div>
								</div>
							<div class="cart-collaterals cart_submit row">
								<div class="totals col-sm-12 col-md-12 col-xs-12">
									<div class="totals">
										<div class="inner">
											<table class="table shopping-cart-table-total margin-bottom-0" id="shopping-cart-totals-table">
												<colgroup>
													<col><col>
												</colgroup>
												<tfoot>
													<tr>
														<td colspan="20" class="a-right"><span>Tổng tiền</span>
														</td>
														<td class="a-right"><strong><span class="totals_price price">{{number_format($cart_price_all)}} VND</span></strong></td>
													</tr>
												</tfoot>
											</table>
											<ul class="checkout">
												<li class="clearfix">
													<a href="{{route('user')}}" class="btn btn_versus f-left" title="Tiếp tục mua hàng" type="button" ><span>Tiếp tục mua hàng</span>
													</a>
													<a href="{{route('user.cart_delete_all',['customer_id' =>Auth::guard('customer')->user()->id])}}" class="btn btn_versus f-left" title="Xóa đơn hàng" type="button"><span>Xóa đơn hàng</span></a>


													<a href="{{route('user.order',['customer_add_id'=>$customer_address])}}" class="btn btn_versus btn-uppercase f-right" title="Tiến hành đặt hàng" type="button"><span>Đặt hàng</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				@else
					<div class="text-center clearfix">
						<div class="col-md-6 text-right" style="padding-top: 10px;">
							Giỏ hàng của bạn đang rỗng!
						</div>
						<div class="col-md-6 text-left">
							<a href="{{route('user')}}" class="btn btn_versus f-left" title="Tiếp tục mua hàng" type="button" ><span>Tiếp tục mua hàng</span></a>
						</div>
					</div>
				@endif
				@else
				@if(session('cart_user') != null)
					<div class="header-cart-content" style="background:#fff;">
						<div class="col-main cart_desktop_page cart-page">
							<div class="cart page_cart ">
									<div class="bg-scroll">
										<div class="cart-thead">
											<div style="width: 17%">Ảnh sản phẩm</div>
											<div style="width: 33%">
												<span class="nobr">Tên sản phẩm</span>
											</div>
											<div style="width: 15%" class="a-center">
												<span class="nobr">Đơn giá</span>
											</div>
											<div style="width: 14%" class="a-center">Số lượng</div>
											<div style="width: 15%" class="a-center">Thành tiền</div>
											<div style="width: 6%">Xoá</div>
										</div>
										<div class="cart-tbody">
											@foreach(session('cart_user') as $cart_of_c)
											<div class="item-cart">
												<div style="width: 17%" class="image dp-flex">
													<a class="product-image" title="{{$cart_of_c['name']}} - {{$cart_of_c['size']}} / {{$cart_of_c['color']}}" href="{{route('user.product-detail',['slug'=>$cart_of_c['slug'],'id'=>$cart_of_c['product_detail_id']])}}">
														<img alt="{{$cart_of_c['name']}} - {{$cart_of_c['size']}} / {{$cart_of_c['color']}}" src="{{url('/')}}/resources/views/admin/product/uploads/{{$cart_of_c['image']}}">
													</a>
												</div>
												<div style="width: 33%;" class="a-center dp-flex">
													<h3 class="product-name text3line" title="{{$cart_of_c['name']}}">
														<a href="{{route('user.product-detail',['slug'=>$cart_of_c['slug'],'id'=>$cart_of_c['product_detail_id']])}}">{{$cart_of_c['name']}}</a>
													</h3><span class="variant-title">{{$cart_of_c['size']}} / {{$cart_of_c['color']}}</span>
												</div>
												<div style="width: 15%" class="a-center">
													<span class="item-price">
														<span class="price">{{number_format($cart_of_c['price'])}}</span>
													</span>
												</div>
												<div style="width: 14%" class="a-center dp-flex">
													<div class="input_qty_pr">
														<form action="{{route('user.update-cart_user',['id' => $cart_of_c['product_detail_id']])}}" method="POST" class="form-inline" role="form">
																<div class="col-md-8" style="padding: 0;">
																<div class="form-group">
																	<input type="number" name="quantity" style="width: 100%;height: 30px;padding: 5px 5px 5px 40px;" value="{{$cart_of_c['quantity']}}">
																</div>
															</div>
															@csrf
																<div class="form-group">
																	<div class="col-md-4 text-left" style="padding-right: 15px; padding-left: 0px; padding-top: 2.5px;">
																		<button type="submit" class="btn"><i class="fa fa-refresh" aria-hidden="true" style="padding: 5px; "></i></button>
																	</div>
																</div>
														</form>
													</div>
												</div>
												<div style="width: 15%" class="a-center">
													<span class="cart-price">
														<span class="price">{{number_format($cart_of_c['price']*$cart_of_c['quantity'])}}</span>
													</span>
												</div>
												<div style="width: 6%">
													<a class="button remove-item remove-item-cart" title="Xóa" href="{{route('user.delete-cart_user',['id'=>$cart_of_c['product_detail_id']])}}" onclick="return confirm('Xóa sản phẩm khỏi giỏ hàng?')">
														<span><span>Xóa</span></span>
													</a>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								<div class="cart-collaterals cart_submit row">
									<div class="totals col-sm-12 col-md-12 col-xs-12">
										<div class="totals">
											<div class="inner">
												<table class="table shopping-cart-table-total margin-bottom-0" id="shopping-cart-totals-table">
													<colgroup>
														<col><col>
													</colgroup>
													<tfoot>
														<tr>
															<td colspan="20" class="a-right"><span>Tổng tiền</span>
															</td>
															<?php 
																$tt = 0;
																foreach (session('cart_user') as $item) {
																	$tt = $tt + ($item['quantity']*$item['price']);
																}
															?>
															<td class="a-right"><strong><span class="totals_price price">{{number_format($tt)}} VND</span></strong></td>
														</tr>
													</tfoot>
												</table>
												<ul class="checkout">
													<li class="clearfix">
														<a href="{{route('user')}}" class="btn btn_versus f-left" title="Tiếp tục mua hàng" type="button" ><span>Tiếp tục mua hàng</span>
														</a>
														<a href="{{route('user.clear-cart_user')}}" class="btn btn_versus f-left" title="Xóa đơn hàng" type="button"><span>Xóa đơn hàng</span></a>


														<a href="{{route('user.order',['customer_add_id'=> 0])}}" class="btn btn_versus btn-uppercase f-right" title="Tiến hành đặt hàng" type="button"><span>Đặt hàng</span>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					@else
						<div class="text-center clearfix">
						<div class="col-md-6 text-right" style="padding-top: 10px;">
							Giỏ hàng của bạn đang rỗng!
						</div>
						<div class="col-md-6 text-left">
							<a href="{{route('user')}}" class="btn btn_versus f-left" title="Tiếp tục mua hàng" type="button" ><span>Tiếp tục mua hàng</span></a>
						</div>
					</div>
					@endif
				@endif
		</div>
	</div>
</section>
@stop()