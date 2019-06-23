@extends('admin.main.admin')
@section('title','Quản lý Danh sách thương hiệu')

@section('main-content')
<section class="content">
      <div class="box">
        <div class="box-header with-border">
        <h4>Danh sách đơn hàng</h4>
          	<div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
	                    title="Collapse">
              	<i class="fa fa-minus"></i></button>
          	</div>
        </div>
        <div class="box-body">
        	<div class="container-fluid">
        		<div class="clearfix" style="width: 100%;">
					<div class="col-md-12 text-right" style="padding: 15px 0;">
						<form action="" method="GET" class="form-inline" role="form">
											<div class="form-group">
												<input type="text" class="form-control" name="search_order" placeholder="">
											</div>
											{{csrf_field()}}
											<button type="submit" class="btn btn-primary">Tìm kiếm</button>
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
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Mã đơn</th>
							<th>Mã khách hàng</th>
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
					@foreach($order as $od)
						<tr>
							<td>{{$od->id}}</td>
							@if($od->customer_id == 0)
							<td>Vãn lai</td>
							@else
							<td>{{$od->customer_id}}</td>
							@endif
							@if($od->customer_address_id == 0)
							<td>Vãn lai</td>
							@else
							<td>{{$od->customer_address_id}}</td>
							@endif
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
								<a href="{{route('admin.order_detail',['id'=>$od->id]) }}" class="btn btn-success btn-xs"><i class="fa fa-edit"> Chi tiết</i></a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div class="clearfix">
					{{$order->appends(request()->only('search_order'))->links()}}
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