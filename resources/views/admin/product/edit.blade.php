@extends('admin.main.admin')
@section('title','Chỉnh sửa sản phẩm')

@section('main-content')
<section class="content">
      <div class="box">
        <div class="box-header with-border">
        <h4>Chỉnh sửa thông tin sản phẩm</h4>
          	<div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
	                    title="Collapse">
              	<i class="fa fa-minus"></i></button>
          	</div>
        </div>
        <div class="box-body">
        	<div class="container-fluid">
        		@if($errors->has('name'))
		          <div class="alert alert-danger">
		            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		            {{$errors->first('name')}}
		          </div>
		        @endif
        		<form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
	        			<div class="container-fluid">
	        				<div class="col-md-3">
	        					<div class="form-group" style="padding: 0 5px;">
									<label class="">Danh mục</label>
										<select name="category_id" class="form-control">
										@foreach($cats as $cat)
										<?php $sl = $pros->category_id == $cat->id ? 'selected' : '' ?>
											<option value="{{$cat->id}}" {{$sl}}>{{$cat->name}}</option>
										@endforeach
									</select>
									</div>
									<div class="form-group" style="margin-right: -5px;">
									<label class="">Giá niên yết</label>
									<input type="number" class="form-control" name="listed_price" value="{{$pros->listed_price}}">
									@if($errors->has('listed_price'))
										<div class="text-danger">
											{{$errors->first('listed_price')}}
										</div>
									@endif
								</div>
	        				</div>
							
							<div class="col-md-3">
								<div class="form-group" style="padding: 0 5px;">
									<label class="">Tên sản phẩm</label>
									<input type="text" class="form-control" name="name" value="{{$pros->name}}" >
									@if($errors->has('name'))
										<div class="text-danger">
											{{$errors->first('name')}}
										</div>
									@endif
								</div>
								<div class="form-group" style="margin-right: -5px;">
									<label class="">Giá khuyến mại</label>
									<input type="number" class="form-control" name="listed_price_sale" value="{{$pros->listed_price_sale}}">
								</div>
							</div>
						<div class="col-md-3">
							<div class="form-group" style="padding: 0 5px;">
								<label class="">Thương hiệu</label>
									<select name="brand_id" class="form-control">
									@foreach($brand as $brand)
									<?php $sl = $pros->brand_id == $brand->id ? 'selected' : '' ?>
										<option value="{{$brand->id}}" {{$sl}}>{{$brand->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-3">
						<div class="form-group">
									<label class="">Ảnh đại diện</label>
									<input type="file" class="form-control" name="image_ava_check" style="margin-right: -5px;padding-top: 0;" multiple="" >
								</div>
	        			</div>
	        		</div>
					@csrf
					<div class="text-right">
						<button type="submit" class="btn btn-primary" style = "margin: 10px 0;">Chỉnh sửa sản phẩm</button>
					</div>
				</form>
        	</div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
    </section>
@stop