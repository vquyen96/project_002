<link rel="stylesheet" type="text/css" href="css/aside.css">
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
{{-- <a href="index3.html" class="brand-link">
  <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
       style="opacity: .8">
  <span class="brand-text font-weight-light">AdminLTE 3</span>
</a> --}}

<!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <div class="avatarImgSidebar" style="background: url('{{ file_exists(storage_path('app/avatar/'.Auth::user()->img)) && Auth::user()->img ? asset('lib/storage/app/avatar/resized-'.Auth::user()->img) : '../images/images.png' }}') no-repeat center /cover;">

                </div>

            </div>
            <div class="info">
                <a href="{{ asset('admin') }}" class="d-block">{{Auth::user()->fullname}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="{{ asset('admin') }}" class="nav-link @if (Request::segment(2) == '') active @endif">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Thống kê
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ asset('admin/') }}"
                       class="nav-link @if (Request::segment(2) == 'account') active @endif">
                    <i class="fas fa-users-cog nav-icon"></i>
                    <p>
                        Quản lí tài khoản
                        <i class="right fa fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ asset('admin/account') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Danh sách tài khoản</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('admin/account/add') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Thêm mới</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="{{ asset('admin/') }}" class="nav-link @if (Request::segment(2) == 'user') active @endif">
                    <i class="fas fa-user-shield nav-icon"></i>
                    <p>
                        Cá Nhân
                        <i class="right fa fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ asset('admin/profile') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Thông tin cá nhân</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ asset('admin/profile/change_pass') }}" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Đổi mật khẩu</p>
                            </a>
                        </li>

                    </ul>
                </li>
                

                <li class="nav-item has-treeview">
                    <a href="{{ asset('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Đăng xuất
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>