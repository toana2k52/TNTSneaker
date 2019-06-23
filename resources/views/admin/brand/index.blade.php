@extends('admin.main.admin')
@section('title','Quản lý Danh sách thương hiệu')

@section('main-content')
<section class="content">
      <div class="box">
        <div class="box-header with-border">
        <h4>Danh sách thương hiệu</h4>
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
						<form action="{{route('admin.brands-add')}}" method="POST" class="form-horizontal" role="form">
								<div class="col-md-7">
									<div class="form-group">
										<input type="text" class="form-control" name="name" placeholder="Tên thương hiệu">
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
												<input type="text" class="form-control" name="search_brand" placeholder="">
											</div>
											@csrf
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
							<th>Tên thương hiệu</th>
							<th>Trạng thái</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					@foreach($brand as $bra)
						<tr>
							<td>{{$bra->id}}</td>
							<td>{{$bra->name}}</td>
							<td>{{$bra->status}}</td>
							<td>
								<a href="{{ route('admin.brands-delete',['id'=>$bra->id]) }}" class="btn btn-default btn-xs" onclick="return confirm('Bạn chắc chắn muốn xóa thương hiệu?')"><i class="fa fa-trash"></i></a>
								<a href="{{ route('admin.brands-edit',['id'=>$bra->id]) }}" data-id ="{{$bra->id}}" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
							</td>
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