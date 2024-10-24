
<!DOCTYPE html>
<html>
<head>
    @include('Admin.Layouts.header')
</head>
<body class="hold-transition skin-blue sidebar-mini">
    @include('sweetalert::alert')
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header position-fixed w-100">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">PureRadiance</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="d-flex justify-content-between navbar navbar-static-top p-0 m-0">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu ml-auto">
        <ul class="nav d-flex flex-row navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('assetsAdmin/images') }}/avatar_admin.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->full_name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('assetsAdmin/images') }}/avatar_admin.jpg" class="img-circle" alt="User Image">
                <p>
                    {{ Auth::user()->full_name }}
                  <small>{{ Auth::user()->email }}</small>
                </p>
              </li>

              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('admin.profile') }}" class="btn btn-github btn-flat">Hồ sơ</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('userList.admin.logout') }}" class="btn btn-github btn-flat">Đăng xuất</a>
                </div>
              </li>
            </ul>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar position-fixed" style="top: 0;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel my-3">
        <div class="pull-left image">
          <img src="{{ asset('assetsAdmin/images') }}/avatar_admin.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->full_name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <hr class="border border-1 border-secondary shadow">
      <!-- search form -->
      {{-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> --}}
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <li>
          <a href="{{ route('home') }}">
            <i class="fa fa-th"></i> <span>Quản lý Menu </span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">FE</small>
            </span>
          </a>
        </li>

        <li class="treeview menu-open">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Trang</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: block;">
              <li><a href="{{ route('userList.index') }}"><i class="fa fa-circle-o"></i>Quản lí người dùng</a></li>
              <li><a href="{{ route('category.index') }}"><i class="fa fa-circle-o"></i>Danh mục</a></li>
              <li><a href="{{ route('brand.index') }}"><i class="fa fa-circle-o"></i>Thương hiệu</a></li>
              <li><a href="{{ route('product.index') }}"><i class="fa fa-circle-o"></i>Sản phẩm</a></li>
              <li><a href="{{ route('order.index') }}"><i class="fa fa-circle-o"></i>Quản lí đơn hàng</a></li>
          </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
    @yield('main-content')
  <!-- /.content-wrapper -->

  <footer class="main-footer mt-auto">
    <div class="pull-right hidden-xs ">
      <b>Version</b> 0.0.1
    </div>
    <strong class="">Copyright &copy; 2018 <a href="https://adminlte.io">TTPM_BKAP</a>.</strong>
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->

@include('Admin.Layouts.footer')

</body>
</html>

