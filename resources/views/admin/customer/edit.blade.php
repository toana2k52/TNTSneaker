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
        								<input type="text" class="form-control" name="name" value="{{$cuss->name}}" placeholder="">
        								@if($errors->has('name'))
        									<div class="text-danger">
        										{{$errors->first('name')}}
        									</div>
        								@endif
        							</div>
        							<div class="form-group">
        								<label class="" for="">Email</label>
        								<input type="email" class="form-control" name="email" value="{{$cuss->email}}" placeholder="">
        								@if($errors->has('email'))
        									<div class="text-danger">
        										{{$errors->first('email')}}
        									</div>
        								@endif
        							</div>
        							<div class="form-group">
        								<label class="" for="">Điện thoại</label>
        								<input type="text" class="form-control" name="phone" value="{{$cuss->phone}}" placeholder="">
        								@if($errors->has('phone'))
        									<div class="text-danger">
        										{{$errors->first('phone')}}
        									</div>
        								@endif
        							</div>
        							<div class="form-group">
        								<label class="" for="">Địa chỉ</label>
        								<input type="text" class="form-control" name="address" value="{{$cuss->address}}" placeholder="">
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
        								<label class="" for="">Trạng thái</label>
        								<select name="status" class="form-control">
        			                        <option value="0" @if($cuss->status == 0) selected @endif>Thường</option>
        			                        <option value="1" @if($cuss->status == 1) selected @endif>Khóa</option>
        		                        </select>
        							</div>
        							<div class="form-group">
        								<label class="" for="">Mật khẩu</label>
        								<input type="password" class="form-control" name="password" placeholder="">
        							</div>
        							@csrf
        							<div class="form-group text-right">
        								<button type="submit" class="btn btn-primary">SỬA KHÁCH HÀNG</button>
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
