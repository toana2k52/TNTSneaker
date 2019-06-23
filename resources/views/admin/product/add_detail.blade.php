@extends('admin.main.admin')
@section('title','Thêm mới sản phẩm')

@section('main-content')
<section class="content">
      <div class="box">
        <div class="box-header with-border">
        <h4>Thêm mới chi tiết sản phẩm</h4>
          	<div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
	                    title="Collapse">
              	<i class="fa fa-minus"></i></button>
          	</div>
        </div>
        <div class="box-body">
        	<div class="container-fluid">
        		<form action="{{route('admin.product-detail-add',['id'=>$pro->id])}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
	        		<div class="col-md-12">
	        			<div class="container-fluid" style="padding-left: 5px; padding-right: 0;border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: #D8D8D8; margin-bottom: 30px;">
	        				<div class="col-md-4">
	        					<div class="form-group" style="margin-right: -5px;">
									<label class="">Danh mục</label>
										<p style="margin-top: 10px;"><i style="margin-left: 5px;">{{$pro->prod_cat->name}}</i></p>
								</div>
	        				</div>
	        				<div class="col-md-4">
	        					<div class="form-group" style="margin-right: -5px;">
									<label class="">Thương hiệu</label>
									<p style="margin-top: 10px;"><i style="margin-left: 5px;">{{$pro->prod_brand->name}}</i></p>
								</div>
	        				</div>

							<div class="col-md-4">
	        					<div class="form-group" style="margin-right: -5px;">
									<label class="">Tên sản phẩm</label>
									<p style="margin-top: 10px;"><i style="margin-left: 5px;" name = "name">{{$pro->name}}</i></p>
									
								</div>
	        				</div>						
	        		</div>
					<div class="col-md-6">
	        			<div class="container-fluid">
	        				<div class="form-group">
								<label class="">Màu sắc</label>
								<input type="text" class="form-control" name="color" >
								@if($errors->has('color'))
									<div class="text-danger">
										{{$errors->first('color')}}
									</div>
								@endif
							</div>

							<div class="row">
								<div class="col-md-12" style="padding: 0; width: 100%;">
									<div class="col-md-4" style="padding: 0; margin-top: 20px;">
										<div class="checkbox">
											<label>
												<input type="checkbox" name="size_all" value="1">
												Thêm tất cả size
											</label>
										</div>
									</div> 
									<div class="col-md-4">
										<div class="form-group">
											<label class="">Từ size</label>
											<select name="size_min" class="form-control">
												<option value="35">35</option>
												<option value="36">36</option>
												<option value="37">37</option>
												<option value="38">38</option>
												<option value="39">39</option>
												<option value="40">40</option>
												<option value="41">41</option>
												<option value="42">42</option>
												<option value="43">43</option>
												<option value="44">44</option>
												</select>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="">Đến size</label>
											<select name="size_max" class="form-control">
												<option value="35">35</option>
												<option value="36">36</option>
												<option value="37">37</option>
												<option value="38">38</option>
												<option value="39">39</option>
												<option value="40">40</option>
												<option value="41">41</option>
												<option value="42">42</option>
												<option value="43">43</option>
												<option value="44">44</option>
												</select>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="">Số lượng</label>
								<input type="number" class="form-control" name="amount" >
								@if($errors->has('amount'))
									<div class="text-danger">
										{{$errors->first('amount')}}
									</div>
								@endif
							</div>
							<div class="form-group" >
							<label class="">Trạng thái</label>
							<div class="radio">
								<label>
									<input type="radio" name="status"  value="0" checked="checked"> Hiển thị
								</label>
								<label>
									<input type="radio" name="status"  value="1"> Ẩn
								</label>
							</div>
						</div>
	        			</div>
	        			</div>

	        			<div class="col-md-6">
	        			<div class="container-fluid">
	        				<div class="form-group">
								<label class="">Giá</label>
								<input type="number" class="form-control" name="price" >
								@if($errors->has('price'))
									<div class="text-danger">
										{{$errors->first('price')}}
									</div>
								@endif
							</div>

							<div class="form-group">
								<label class="">Giá khuyến mãi</label>
								<input type="number" class="form-control" name="price_sale" >
							</div>
	        				<div class="form-group">
								<label class="">Mô tả</label>
								<textarea name="content" style="width: 100%"  rows="5" class="" ></textarea>
								@if($errors->has('content'))
									<div class="text-danger">
										{{$errors->first('content')}}
									</div>
								@endif
							</div>	

							<div class="form-group">
								<label class="">Ảnh đại diện</label>
								<input type="file" class="form-control" name="image_pro" style="padding-top: 0;" >
								@if($errors->has('image_pro'))
									<div class="text-danger">
										{!! $errors->first('image_pro') !!}
									</div>
								@endif
							</div>
	        			</div>
	        			
	        		</div>
	        		</div>

					@csrf
					<div class="text-right">
						<button type="submit" class="btn btn-primary" style = "margin: 10px 0;">Thêm sản phẩm</button>
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
<?php 
	function showcateparent($cats_pa, $parent = 0, $char = ''){
		$category_child = [];
		foreach ($cats_pa as $key => $item) {
			if ($item->parent == $parent) {
				$category_child[] = $item;
			}
		}

		if ($category_child) {
			foreach ($category_child as $key => $item) {
				echo '<option value="'.$item->id.'"> '.$char.$item->name.'</option>';

				showcateparent($cats_pa, $item['id'], $char.'&nbsp&nbsp&nbsp');
			}
		}
	}
?>
@stop