@extends('admin.main.admin')
@section('title','Nhân viên')

@section('main-content')
<section class="content">
      <div class="box">
        <div class="box-header with-border">
        <h4>Danh sách nhân viên</h4>
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
						<a href="{{route('register_admin')}}" class="btn btn-primary" title="Thêm mới sản phẩm">Thêm mới</a>
					</div>
					<div class="col-md-6 text-right" style="padding: 15px 0;">
						<form action="" method="GET" class="form-inline" role="form">
											<div class="form-group">
												<input type="text" class="form-control" name="search_ad" placeholder="">
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
							<th>Họ tên</th>
							<th>Email</th>
							<th>SDT</th>
							<th>Địa chỉ</th>
							<th>Ảnh đại diện</th>
							<th>Chức vụ</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					
					@foreach($ads as $ad)
						<tr>
							<td>{{$ad->id}}</td>
							<td>{{$ad->name}}</td>
							<td>{{$ad->email}}</td>
							<td>{{$ad->phone}}</td>
							<td>{{$ad->address}}</td>
							<td>
								<img src="{{url('resources/views/admin/member/uploads')}}/{{$ad->image}}" alt="Lỗi tải hình ảnh!" width="50" height="auto">
							</td>
							<td>
								@if($ad->position == 0) Nhân viên @endif
								@if($ad->position == 1) Quản lý @endif
								@if($ad->position == 3) Khác @endif
							</td>
							
							<td>
								@if(Auth::user()->position == 1)
								<a href="{{ route('admin.member-delete',['id'=>$ad->id]) }}" class="btn btn-default btn-xs" onclick="return confirm('Xóa nhân viên?')"><i class="fa fa-trash"></i></a>
								<a href="{{ route('admin.member-edit',['id'=>$ad->id]) }}" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
								@endif
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				<div class="clearfix">
					{{$ads->appends(request()->only('search_ad'))->links()}}
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