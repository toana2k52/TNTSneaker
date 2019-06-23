@extends('admin.main.admin')
@section('title','Quản lý Danh sách thương hiệu')

@section('main-content')
<section class="content">
      <div class="box">
        <div class="box-header with-border">
          	<div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
	                    title="Collapse">
              	<i class="fa fa-minus"></i></button>
          	</div>
        </div>
        <div class="box-body">
        	<div class="container-fluid">
        		<div class="clearfix">
        			<div class="col-md-4">
                        @if($check == 'kvl')
                        <legend>Chi tiết khách hàng</legend>
                        <p><span style="font-weight: bold;">Mã đơn hàng: </span>{{$order->id}}</p>
                        <p><span style="font-weight: bold;">Họ tên: </span>{{$order->user_name}}</p>
                        <p><span style="font-weight: bold;">Email: </span>{{$order->user_email}}</p>
                        <p><span style="font-weight: bold;">Phone: </span>{{$order->user_phone}}</p>
                        <p><span style="font-weight: bold;">Address: </span>{{$order->user_address}}</p>
                        @else
        				<legend>Chi tiết khách hàng</legend>
        				<p><span style="font-weight: bold;">Mã đơn hàng: </span>{{$order->id}}</p>
        				<p><span style="font-weight: bold;">Họ tên: </span>{{$order->cust->name}}</p>
        				<p><span style="font-weight: bold;">Email: </span>{{$order->cust->email}}</p>
        				<p><span style="font-weight: bold;">Phone: </span>{{$order->cust->phone}}</p>
        				<p><span style="font-weight: bold;">Address: </span>{{$order->cust->address}}</p>
                        @endif
        			</div>
        			<div class="col-md-4">
                        @if($check == 'kvl')
        				<legend>Chi tiết nhận hàng - thanh toán</legend>
        				<p><span style="font-weight: bold;">Khách vãn lai</span></p>
        				<p><span style="font-weight: bold;">Họ tên: </span>{{$customer_add['user_name']}}</p>
        				<p><span style="font-weight: bold;">Email: </span>{{$customer_add['user_email']}}</p>
        				<p><span style="font-weight: bold;">Phone: </span>{{$customer_add['user_phone']}}</p>
        				<p><span style="font-weight: bold;">Address: </span>{{$customer_add['user_address']}}</p>
                        @else
                        <legend>Chi tiết nhận hàng - thanh toán</legend>
                        <p><span style="font-weight: bold;">Mã địa chỉ: </span>{{$customer_add->id}}</p>
                        <p><span style="font-weight: bold;">Họ tên: </span>{{$customer_add->name}}</p>
                        <p><span style="font-weight: bold;">Email: </span>{{$customer_add->email}}</p>
                        <p><span style="font-weight: bold;">Phone: </span>{{$customer_add->phone}}</p>
                        <p><span style="font-weight: bold;">Address: </span>{{$customer_add->address}}</p>
                        @endif
        			</div>
        			<div class="col-md-4">
        				<legend>Trạng thái</legend>
        				<form action="{{route('admin.order_edit',['id'=>$order->id])}}" method="POST" class="form-horizontal" role="form">
        					<div class="form-group">
        						<select name="status"  class="form-control" required="required">
        							<option value="0">Chờ xác nhận </option>
        							<option value="1">Đang vận chuyển</option>
        							<option value="2">Thanh toán thành công</option>
        							<option value="3">Đã hủy</option>
        						</select>
        					</div>
                            <div class="form-group">
                                <label class="" for="">Lý do hủy</label>
                                <input type="text" class="form-control" name="note" >
                            </div>
        					@csrf
        					<div class="text-right form-group">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
        				</form>
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
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
    </section>
@stop