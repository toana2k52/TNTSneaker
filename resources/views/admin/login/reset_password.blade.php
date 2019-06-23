@extends('admin.main.admin')
@section('title','Đổi mật khẩu')
@section('main-content')

<section class="content">
      <div class="box">
        <div class="box-header with-border">
        <h4>ĐỔI MẬT KHẨU</h4>
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
                <div class="col-md-4 text-center">
                    <img width="90%;" height="auto" src="{{url('/')}}/resources/views/admin/member/uploads/{{Auth::user()->image}}" alt="Ảnh đại diện" style="margin-bottom: 15px;">                   
                </div>  
                <div class="col-md-8">
                    <form action="{{route('reset_password')}}" method="POST" class="form-horizontal" role="form">
                            <div class="form-group">
                                <legend>{{Auth::user()->name}}</legend>
                            </div>
                    
                            <div class="form-group">
                                <label class="" for="">Mật khẩu cũ</label>
                                <input type="password" class="form-control" name="old_password" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="" for="">Mật khẩu mới</label>
                                <input type="password" class="form-control" name="password" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="" for="">Nhập lại mật khẩu mới</label>
                                <input type="password" class="form-control" name="confirm_password" placeholder="">
                            </div>
                            @csrf
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                            </div>
                    </form>
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
