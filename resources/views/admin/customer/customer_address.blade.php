@extends('admin.main.admin')
@section('title','Địa chỉ đặt hàng')
@section('main-content')

<section class="content">
      <div class="box">
        <div class="box-header with-border">
        <h4>Địa chỉ đặt hàng  - {{$cuss->name}}</h4>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="container-fluid">
                <div class="col-md-12">
                        <div class="clearfix" style="width: 100%;">
                            <div class="col-md-6 " style="padding: 15px 0;">
                                <a href="{{route('admin.customer-customer_address-add',['id'=>$cuss->id])}}" class="btn btn-primary" title="Thêm mới địa chỉ">Thêm mới</a>
                            </div>
                            <div class="col-md-6 text-right" style="padding: 15px 0;">
                                <form action="" method="GET" class="form-inline" role="form">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="search_add" placeholder="">
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
                    @foreach($cus_adds as $cus_add)
                    <div class="col-md-4" style="padding: 5px;">
                      <div class="alert alert-success alert-dismissible" role="alert"  >
                        <p><strong>{{$cus_add->id}}</strong></p>
                        <strong>{{$cus_add->name}}</strong>
                        <p><strong>Điện thoại: </strong>{{$cus_add->phone}}</p>
                        <p><strong>Email: </strong>{{$cus_add->email}}</p>
                        <div style="height: 60px;">
                          <p><strong>Địa chỉ: </strong>{{$cus_add->address}}</p>
                        </div>
                        <div class="text-right" style="margin-top: 20px;">
                            <a href="{{route('admin.customer-customer_address-delete',['id'=>$cus_add->id])}}" class="btn btn-default btn-xs btn-danger" onclick="return confirm('Xóa địa chỉ')"><i class="fa fa-trash"></i></a>
                            <a href="{{route('admin.customer-customer_address-edit',['id'=>$cus_add->id,'id_cuss' =>$cuss->id])}}" class="btn btn-default btn-xs btn-warning"><i class="fa fa-edit"></i></a>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    <div class="col-md-12 clearfix">
                        {{$cus_adds->appends(request()->only('search_add'))->links()}}
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
@stop()
