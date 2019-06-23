@extends('admin.main.admin');
@section('title','Chỉnh sửa nhân viên')
@section('main-content')

<section class="content">
      <div class="box">
        <div class="box-header with-border">
        <h4>CHỈNH SỬA NHÂN VIÊN</h4>
          	<div class="box-tools pull-right">
	            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
	                    title="Collapse">
              	<i class="fa fa-minus"></i></button>
          	</div>
        </div>
        <div class="box-body">
        	<div class="container-fluid">
        		<form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
        							<div class="form-group">
        								<label class="" for="">Họ tên</label>
        								<input type="text" class="form-control" name="name" value="{{$ad->name}}" placeholder="">
        								@if($errors->has('name'))
        									<div class="text-danger">
        										{{$errors->first('name')}}
        									</div>
        								@endif
        							</div>
        							<div class="form-group">
        								<label class="" for="">Email</label>
        								<input type="email" class="form-control" name="email" value="{{$ad->email}}" placeholder="">
        								@if($errors->has('email'))
        									<div class="text-danger">
        										{{$errors->first('email')}}
        									</div>
        								@endif
        							</div>
        							<div class="form-group">
        								<label class="" for="">Điện thoại</label>
        								<input type="text" class="form-control" name="phone" value="{{$ad->phone}}" placeholder="">
        								@if($errors->has('phone'))
        									<div class="text-danger">
        										{{$errors->first('phone')}}
        									</div>
        								@endif
        							</div>
        							<div class="form-group">
        								<label class="" for="">Địa chỉ</label>
        								<input type="text" class="form-control" name="address" value="{{$ad->address}}" placeholder="">
        								@if($errors->has('address'))
        									<div class="text-danger">
        										{{$errors->first('address')}}
        									</div>
        								@endif
        							</div>

                                    <div class="form-group">
                                        <label class="">Ảnh đại diện</label>
                                        <input type="file" class="form-control" name="image_pro" >
                                    </div>

        							<div class="form-group">
        								<label class="" for="">Chức vụ</label>
        								<select name="position" class="form-control">
        			                        <option value="0" @if($ad->position == 0) selected @endif>Nhân viên</option>
        			                        <option value="1" @if($ad->position == 1) selected @endif>Quản lý</option>
        			                        <option value="2" @if($ad->position == 2) selected @endif>Khác</option>
        		                        </select>
        							</div>
        							<div class="form-group">
        								<label class="" for="">Mật khẩu</label>
        								<input type="password" class="form-control" name="password" placeholder="">
        								@if($errors->has('password'))
        									<div class="text-danger">
        										{{$errors->first('password')}}
        									</div>
        								@endif
        							</div>
        							@csrf
        							<div class="form-group text-right">
        								<button type="submit" class="btn btn-primary">SỬA NHÂN VIÊN</button>
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
@stop()
