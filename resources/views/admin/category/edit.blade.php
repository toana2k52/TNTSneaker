@extends('admin.main.admin')
@section('title','Quản lý danh mục')

@section('main-content')
<section class="content">
      <div class="box">
        <div class="box-header with-border">
        <h4>Sửa danh mục sản phẩm</h4>
          	<div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
	                    title="Collapse">
              	<i class="fa fa-minus"></i></button>
          	</div>
        </div>
        <div class="box-body">
        	<div class="container-fluid">
				<form action="{{route('admin.category-edit',['id'=>$cats->id])}}" method="POST" class="form-horizontal" role="form">
								<div class="col-md-3">
									<div class="form-group">
										<input type="text" class="form-control" name="name" placeholder="Tên danh mục" value="{{$cats->name}}">
									</div>
									
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<select name="parent" class="form-control" required="required">
											<option value="0">Danh mục gốc</option>
											@foreach($cats_pa as $cat_pa)
											<option value="{{$cat_pa->id}}" @if($cat_pa->id == $cats->parent) selected @endif>{{$cat_pa->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-3 text-center">
									<div class="form-group">
										<div class="radio">
											<label>
												<input type="radio" name="status" value="0" @if($cats->status == 0) checked="checked" @endif>
												Ẩn
											</label>
											<label>
												<input type="radio" name="status"  value="1" @if($cats->status == 1) checked="checked" @endif>
												Hiện
											</label>
										</div>
									</div>
								</div>
								@csrf
								<div class="col-md-2 text-left">
									<div class="form-group">
											<button type="submit" class="btn btn-primary" style="width:100%;">Sửa danh mục</button>
									</div>
								</div>
						</form>
						@if($errors->has('name'))
							<div class="text-danger">
								{{$errors->first('name')}}
							</div>
						@endif
        	</div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
    </section>
@stop