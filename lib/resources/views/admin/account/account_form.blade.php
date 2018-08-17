@extends('admin.master')

@section('title', 'Thêm tài khoản')
@section('main')
	
<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{isset($item)? 'Thay đổi' : 'Thêm mới'}} tài khoản</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ asset('admin') }}">Trang chủ</a></li>
              <li class="breadcrumb-item"><a href="{{ asset('admin/account') }}">Tài khoản</a></li>
              <li class="breadcrumb-item active">{{isset($item)? 'Thay đổi' : 'Thêm mới'}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6 col-sm-9">
			      <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{isset($item)? 'Thay đổi' : 'Thêm mới'}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form role="form" method="post" enctype="multipart/form-data" action="{{isset($item)?  asset('admin/account/edit/'.$item->id) : asset('admin/account/add')}}">
                <div class="card-body">
                	<div class="form-group">
	                    <label>Tên đăng nhập</label>
	                    <input type="text" class="form-control" placeholder="Username" name="acc[username]" value="{{isset($item)? $item->username : ''}}" required {{ isset($item) ? 'disabled' : '' }} required>
	                </div>
	                <div class="form-group">
	                    <label>Họ và tên</label>
	                    <input type="fullname" class="form-control" placeholder="Fullname" name="acc[fullname]" value="{{isset($item)? $item->fullname : ''}}">
	                </div>
	                <div class="form-group">
	                    <label>Email</label>
	                    <input type="email" class="form-control" placeholder="Enter email" name="acc[email]" value="{{isset($item)? $item->email : ''}}"> 
	                </div>
	                <div class="form-group">
	                    <label>Mật khẩu</label>
	                    <input type="password" class="form-control" placeholder="Password" name="acc[password]">
	                </div>
	                <div class="form-group">
	                    <label>Số điện thoại</label>
	                    <input type="text" class="form-control" name="acc[phone]" value="{{isset($item)? $item->phone : ''}}" >
	                </div>
                  <div class="form-group">
                      <label>Số chứng minh nhân dân</label>
                      <input type="text" class="form-control" name="acc[id_number]" value="{{isset($item)? $item->id_number : ''}}" >
                  </div>
                  <div class="form-group">
                    <label>Ngày sinh</label>
                    <input type="date" name="acc[birthday]" required value="{{isset($item)? $item->birthday : ''}}" min="1000-01-01" max="3000-12-31" class="form-control">
                  </div>
                  <div class="form-group">
                      <label>Giới tính</label>
                      <select class="form-control" name="acc[gender]">
                        <option value="1" {{ isset($item) && $item->gender == 1 ? 'selected' : ''}}>Nam</option>
                        <option value="2" {{ isset($item) && $item->gender == 2 ? 'selected' : ''}}>Nữ</option>
                        <option value="3" {{ isset($item) && $item->gender == 3 ? 'selected' : ''}}>Khác</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <label>Địa chỉ</label>
                      <input type="text" class="form-control" name="acc[address]" value="{{isset($item)? $item->address : ''}}" >
                  </div>
                    
	                <div class="form-group">
	                    <label>Ảnh đại diện</label>
                      <div>
                        <input id="img" type="file" name="acc[img]" class="cssInput" onchange="changeImg(this)" style="display: none!important;">
                        <img style="cursor: pointer;" id="avatar" class="cssInput thumbnail imageForm" src="{{ isset($item->img) && file_exists(storage_path('app/avatar/'.$item->img)) && $item->img ? asset('lib/storage/app/avatar/resized-'.$item->img) : '../images/images.png' }}">
                      </div>
      		            
	                </div>
                   <div class="form-group">
                      <label>Chức vụ</label>
                      <select class="form-control" name="acc[level]">
                        <option value="0" {{ isset($item) && $item->level == 0 ? 'selected' : ''}}>Vô hiệu hóa</option>
                        <option value="1" {{ isset($item) && $item->level == 1 ? 'selected' : ''}}>Giám đốc</option>
                        <option value="2" {{ isset($item) && $item->level == 2 ? 'selected' : ''}}>Nhân viên</option>
                        <option value="3" {{ isset($item) && $item->level == 3 ? 'selected' : ''}}>Người dùng</option>
                      </select>
                  </div>
	                
                    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-primary" value="{{isset($item)? 'Thay đổi' : 'Thêm mới'}}">
                  {{csrf_field()}}
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@stop
@section('script')

@stop
