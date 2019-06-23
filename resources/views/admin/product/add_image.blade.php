@extends('admin.main.admin')
@section('title','Thêm mới sản phẩm')

@section('main-content')
<section class="content">
      <div class="box">
        <div class="box-header with-border">
        <h4>Thêm mới album ảnh sản phẩm</h4>
          	<div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
	                    title="Collapse">
              	<i class="fa fa-minus"></i></button>
          	</div>
        </div>
        <div class="box-body">
        	<div class="container-fluid">
 
	        		<div class="col-md-12">
	        			<div class="container-fluid" style="padding-left: 5px; padding-right: 0;border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #D8D8D8; margin-bottom: 30px;">
	        				<div class="col-md-4">
	        					<div class="form-group" style="margin-right: -5px;">
									<label class="">Danh mục</label>
										<p style="margin-top: 10px;"><i style="margin-left: 5px;">{{$pros->prod_cat->name}}</i></p>
								</div>
	        				</div>
	        				<div class="col-md-4">
	        					<div class="form-group" style="margin-right: -5px;">
									<label class="">Thương hiệu</label>
									<p style="margin-top: 10px;"><i style="margin-left: 5px;">{{$pros->prod_brand->name}}</i></p>
								</div>
	        				</div>

							<div class="col-md-4">
	        					<div class="form-group" style="margin-right: -5px;">
									<label class="">Tên sản phẩm</label>
									<p style="margin-top: 10px;"><i style="margin-left: 5px;" name = "name">{{$pros->name}}</i></p>
									
								</div>
	        				</div>						
	        		</div>

					<div class="col-md-6">
	        			<div class="container-fluid">
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
									<th>Mã ảnh</th>
									<th>ảnh</th>
									<th style="padding-left: 30px;">Thao tác</th>
								</tr>
							</thead>

							<tbody>
								@foreach($pro_image as $pr)
								<tr>
									<td>{{$pr->id}}</td>
									<td style="width: 100px;"><image src ="{{url('/')}}/resources/views/admin/product/uploads/{{$pr->image}}" style = "width: 100%"></image></td>
									<td style="padding-left: 30px;padding-top: 30px;">
										<a href="{{route('admin.product-delete-image',['id' => $pr->id])}}" class="btn btn-default btn-xs" onclick="return confirm('Xóa ảnh sản phẩm?')"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
	        			</div>
	        		</div>
	        		<form action="{{route('admin.product-image-add',['id'=>$pros->id])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
	        			<div class="col-md-6">
		        			<div class="container-fluid">
									<input type="hidden" class="form-control" name="product_id" value="{{$pros->id}}">
		        				<div class="form-group">
									<label class="">Chọn nhiều ảnh</label>
									<input type="file" class="form-control" name="other_img[]" style="margin-right: -5px;padding-top: 0;" multiple="" >
								</div>

								
		        			</div>
	        			
		        		</div>

						@csrf
						<div class="text-right">
							<button type="submit" class="btn btn-primary" style = "margin: 10px 0;">Thêm ảnh sản phẩm</button>
						</div>
					</form>
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