@extends('admin.main.admin')

@section('title','Administrators')
@section('main-content')
	<section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        <h4>ADMIN</h4>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
           <div class="jumbotron">
            <div class="container">
              <p>Trang quản trị admin</p>
              <!-- <p>
                <a class="btn btn-primary btn-lg">Learn more</a>
              </p> -->
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
@stop()