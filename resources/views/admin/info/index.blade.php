@extends('admin.main.admin')
@section('title','Nhân viên')

@section('main-content')
<section class="content">
      <div class="box">
        <div class="box-header with-border">
        <h4>Thông tin cá nhân</h4>
          	<div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
	                    title="Collapse">
              	<i class="fa fa-minus"></i></button>
          	</div>
        </div>
        <div class="box-body">
        	<div class="container-fluid">
  				<div class="col-md-4 text-center">
  					<img width="90%;" height="auto" src="{{url('/')}}/resources/views/admin/member/uploads/{{Auth::user()->image}}" alt="Ảnh đại diện">
  					
  				</div>	

  				<div class="col-md-4">
  					<br>
  					<h4><span style="font-weight: bold;">Họ tên: </span>{{Auth::user()->name}}</h4>
  					<br>
  					<h4><span style="font-weight: bold;">Email: </span>{{Auth::user()->email}}</h4>
  					<br>
  					<h4><span style="font-weight: bold;">Điện thoại: </span>{{Auth::user()->phone}}</h4>
  					
  				</div>	

  				<div class="col-md-4">
  					<br>

  					<h4><span style="font-weight: bold;">Địa chỉ: </span>{{Auth::user()->address}}</h4>
  					<br>
  					<h4><span style="font-weight: bold;">Chức vụ: </span>
						@if(Auth::user()->position == 0) Nhân viên @endif
						@if(Auth::user()->position == 1) Quản lý @endif
						@if(Auth::user()->position == 3) Khác @endif
  					</h4>
  					
  				</div>	
  				<div class="col-md-12 text-right">
  					<a href="{{ route('admin.member-edit',['id'=>Auth::user()->id]) }}" class="btn btn-primary" title="Thêm mới sản phẩm">Chỉnh sửa thông tin cá nhân</a>
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