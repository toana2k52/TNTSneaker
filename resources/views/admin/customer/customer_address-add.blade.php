@extends('admin.main.admin')
@section('title','Địa chỉ đặt hàng')
@section('main-content')

<section class="content">
      <div class="box">
        <div class="box-header with-border">
        <h4>Thêm mới địa chỉ đặt hàng  - {{$cuss->name}}</h4>
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
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="container-fluid">
                <form action="{{route('admin.customer-customer_address-add',['id'=>$cuss->id])}}" method="POST" class="form-horizontal" role="form">
                      <div class="form-group">
                        <label class="" for="">Họ tên</label>
                        <input type="text" class="form-control" name="name" placeholder="">
                        @if($errors->has('name'))
                          <div class="text-danger">
                            {{$errors->first('name')}}
                          </div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label class="" for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="">
                        @if($errors->has('email'))
                          <div class="text-danger">
                            {{$errors->first('email')}}
                          </div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label class="" for="">Điện thoại</label>
                        <input type="text" class="form-control" name="phone" placeholder="">
                        @if($errors->has('phone'))
                          <div class="text-danger">
                            {{$errors->first('phone')}}
                          </div>
                        @endif
                      </div>
                      <div class="form-group">
                        <label class="" for="">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" placeholder="">
                        @if($errors->has('address'))
                          <div class="text-danger">
                            {{$errors->first('address')}}
                          </div>
                        @endif
                      </div>
                      @csrf
                      <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">THÊM ĐỊA CHỈ</button>
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
