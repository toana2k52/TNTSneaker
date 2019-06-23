@extends('admin.main.admin')
@section('title','Quản lý danh mục')

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
						<form action="{{route('admin.category-add')}}" method="POST" class="form-horizontal" role="form">
								<div class="col-md-3">
									<div class="form-group">
										<input type="text" class="form-control" id="name" name="name" placeholder="Tên danh mục">
									</div>
									<div class="form-group" style="margin-right: -5px;">
									<input type="hidden" class="form-control" id="slug" name="slug">
								</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<select name="parent" class="form-control" required="required">
											<option value="0">Danh mục gốc</option>
											{{showcateparent($cats)}}
										</select>
									</div>
								</div>
								<div class="col-md-3 text-center">
									<div class="form-group">
										<div class="radio">
											<label>
												<input type="radio" name="status" value="0">
												Ẩn
											</label>
											<label>
												<input type="radio" name="status"  value="1" checked="checked">
												Hiện
											</label>
										</div>
									</div>
								</div>
								@csrf
								<div class="col-md-2 text-left">
									<div class="form-group">
											<button type="submit" class="btn btn-primary" style="width:100%;">Thêm mới</button>
									</div>
								</div>
						</form>
						@if($errors->has('name'))
							<div class="text-danger">
								{{$errors->first('name')}}
							</div>
						@endif
					</div>
					<div class="col-md-6 text-right" style="padding: 15px 0;">
						<form action="" method="GET" class="form-inline" role="form">
											<div class="form-group">
												<input type="text" class="form-control" name="search_cats" placeholder="">
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
							<th>STT</th>
							<th>Tên danh mục</th>
							<th>Trạng thái</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					@foreach($cats as $cat)
						<tr>
							<td>{{$cat->id}}</td>
							<td>{{$cat->name}}</td>
							<td>
								@if($cat->status == 0) Ẩn @endif
								@if($cat->status == 1) Hiện @endif
							</td>
							<td>
								<a href="{{ route('admin.category-del',['id'=>$cat->id]) }}" class="btn btn-default btn-xs" onclick="return confirm('Bạn chắc chắn muốn xóa danh mục?')"><i class="fa fa-trash"></i></a>
								<a href="{{route('admin.category-edit',['id'=>$cat->id])}}" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
							</td>
						</tr>
						@if($cat->getChilds)
							@foreach($cat->getChilds as $child)
							<tr>
								<td>{{$child->id}}</td>
								<td style = "padding-left: 20px;">-- {{$child->name}}</td>
								<td>
									@if($child->status == 0) Ẩn @endif
									@if($child->status == 1) Hiện @endif
								</td>
								<td>
									<a href="{{ route('admin.category-del',['id'=>$child->id]) }}" class="btn btn-default btn-xs" onclick="return confirm('Bạn chắc chắn muốn xóa danh mục?')"><i class="fa fa-trash"></i></a>
									<a href="{{route('admin.category-edit',['id'=>$child->id])}}" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
								</td>
							</tr>
								@if($child->getChilds)
									@foreach($child->getChilds as $child_pa)
									<tr>
										<td>{{$child_pa->id}}</td>
										<td style = "padding-left: 40px;">-- {{$child_pa->name}}</td>
										<td>
											@if($child_pa->status == 0) Ẩn @endif
											@if($child_pa->status == 1) Hiện @endif
										</td>
										<td>
											<a href="{{ route('admin.category-del',['id'=>$child_pa->id]) }}" class="btn btn-default btn-xs" onclick="return confirm('Bạn chắc chắn muốn xóa danh mục?')"><i class="fa fa-trash"></i></a>
											<a href="{{route('admin.category-edit',['id'=>$child_pa->id])}}"  class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
										</td>
									</tr>
									@endforeach
								@endif
							@endforeach
						@endif
					@endforeach
					</tbody>
				</table>
				<div class="clearfix">
					{{$cats->appends(request()->only('search_cats'))->links()}}
				</div>
        	</div>
        </div>

        <div class="modal fade" id="modal_edit_cats">
        	<div class="modal-dialog">
        		<div class="modal-content">
        			<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        				<h4 class="modal-title" id="cat_tt"></h4>
        			</div>
        			<div class="modal-body">
        				<div class="clearfix">
        					<form method="POST" class="form-horizontal" id="form_edit_cats">
								<div class="col-md-4">
									<div class="form-group">
										<input type="text" class="form-control" name="name" id="name" value = "" placeholder="Tên danh mục">
									</div>
									
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<select name="parent" id="parent" class="form-control" required="required">
											<option value="0">Danh mục gốc</option>
											{{showcateparent($cats)}}
										</select>
									</div>
								</div>
								<div class="col-md-4 text-center">
									<div class="form-group">
										<div class="radio">
											<label>
												<input type="radio" name="status" id="status" value="0">
												Ẩn
											</label>
											<label>
												<input type="radio" name="status" id="status"  value="1" checked="checked">
												Hiện
											</label>
										</div>
									</div>
								</div>
								<input type="hidden" name="_token" id="heletoken" value="{{csrf_token()}}">
								<div class="col-md-12 text-right">
									<div class="form-group">
											<button  type="button" id="btn_edit_cats" data-id="" class="btn btn-primary" style="margin-right: 5px;">Chỉnh sửa</button>
											<a href="" class="btn btn-danger" data-dismiss="modal" style="float: right;">Đóng</a>
									</div>
								</div>
						</form>
						@if($errors->has('name'))
							<div class="text-danger">
								{{$errors->first('name')}}
							</div>
						@endif</div>
        			</div>
        			<div class="modal-footer">
        				
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