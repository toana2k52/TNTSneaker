@extends('admin.main.admin')
@section('title','Quản lý sản phẩm')

@section('main-content')
<section class="content">
      <div class="box">
        <div class="box-header with-border">
        <h4>Danh mục sản phẩm</h4>
          	<div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
	                    title="Collapse">
              	<i class="fa fa-minus"></i></button>
          	</div>
        </div>
        <div class="box-body">
        	<div class="container-fluid">
        		<div class="clearfix" style="width: 100%;">
					<div class="col-md-6 " style="padding: 15px 0;">
						<a href="{{route('admin.product-add')}}" class="btn btn-primary" title="Thêm mới sản phẩm">Thêm mới</a>
					</div>
					<div class="col-md-6 text-right" style="padding: 15px 0;">
						<form action="" method="GET" class="form-inline" role="form">
											<div class="form-group">
												<input type="text" class="form-control" name="search_pros" placeholder="">
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
		        <div class="clearfix">
		        	<div class="col-md-4" style="padding-left: 0; padding-right: 0;">
		        		<table class="table table-hover">
							<thead>
								<tr>
									<th>Mã</th>
									<th>DM</th>
									<th>Tên</th>
									<th>TH</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							@foreach($pros as $pro)
								<tr style="height: 100px;">
									<td>{{$pro->id}}</td>
									<td>{{$pro->prod_cat->name}}</td>
									<td>{{$pro->name}}</td>
									<td>{{$pro->prod_brand->name}}</td>
									<td>
										<a href="{{ route('admin.product-detail-add',['id'=>$pro->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-plus"></i></a>
										<a href="{{ route('admin.product-delete',['id'=>$pro->id]) }}" class="btn btn-default btn-xs" onclick="return confirm('Xóa sản phẩm này các sản phẩm liên quan sẽ bị xóa! Đồng ý?')"><i class="fa fa-trash"></i></a>
										<a href="{{ route('admin.product-edit',['id'=>$pro->id]) }}" class="btn btn-default btn-xs" style="width: 21.4333px;"><i class="fa fa-edit"></i></a>
									</td>
									<td>
										<a href="{{ route('admin.product-image-add',['id'=>$pro->id]) }}" style="margin-top: 10px;" class="btn btn-default btn-xs"><i class="fa fa-file-image-o"></i></a>
										<a href="{{ route('admin.product-dt',['id'=>$pro->id]) }}" class="btn btn-default btn-xs" style="margin-top: 10px;"><i class="fa fa-angle-double-right" style="padding: 0 1.5px;"></i></a>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
						<div class="clearfix" >
							{{$pros->appends(request()->only('search_pros'))->links()}}
						</div>
		        	</div>
		        	<div class="col-md-8" style="padding-left: 5px; padding-right: 0;border-left-width: 1px; border-left-style: solid; border-left-color: #D8D8D8;">
		        		<table class="table table-hover">
							<thead>
								<tr>
									<th>Màu</th>
									<th>Size</th>
									<th>SL</th>
									<th>Giá</th>
									<th>Giá KM</th>
									<th>Mô tả</th>
									<th>Trạng thái</th>
									<th>Lượt xem</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							@foreach($pros_detail as $pro_de)
								<tr>
									<td>{{$pro_de->color}}</td>
									<td>{{$pro_de->size}}</td>
									<td>{{$pro_de->amount}}</td>
									<td>{{$pro_de->price}}</td>
									<td>{{$pro_de->price_sale}}</td>
									<td>{{$pro_de->content}}</td>
									<td>
										@if($pro_de->status == 0) Hiển thị @endif
										@if($pro_de->status == 1) Ẩn @endif
									</td>
									<td>{{$pro_de->view}}</td>
									<td>
										<a href="{{ route('admin.product-delete-detail',['id'=>$pro_de->id]) }}" class="btn btn-default btn-xs" onclick="return confirm('Xóa sản phẩm?')"><i class="fa fa-trash"></i></a>
										<a href="{{ route('admin.product-edit-detail',['id'=>$pro_de->product_id,'id_detail'=>$pro_de->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
						<div class="clearfix text-right">
							{{$pros_detail->appends(request()->only('search_pros'))->links()}}
						</div>
		        	</div>
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