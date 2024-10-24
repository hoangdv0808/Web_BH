@extends('Admin.Layouts.master')
@section('title', 'Dashboard')
@section('main-content')
<div class="content-wrapper"  style="margin-top: 50px">
    <div class="d-flex justify-content-between align-items-center skin-blue-style shadow text-dark p-5">
        <div>
            <h3 class="p-0 m-0">Thông tin tài khoản</h3>
            <p></p>
        </div>
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 bg-transparent text-dark">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-secondary">Trang chủ</a></li>
                  <li class="breadcrumb-item text-dark active" aria-current="page">Hồ sơ</li>
                </ol>
              </nav>
        </div>
    </div>
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="mt-5">
            <div class="jumbotron jumbotron-fluid col-9 p-5 mx-auto">
                <div class="container">
                    <h3 class="display-3">Tên tài khoản: {{ Auth::user()->full_name }}</h3>
                    <p class="lead"><b>Email:</b> {{ Auth::user()->email }}</p>
                    <p class="lead"><b>Số điện thoại:</b> {{ Auth::user()->phone }}</p>
                    <p class="lead"><b>Địa chỉ:</b> {{ Auth::user()->address }}</p>
                    <p class="lead"><b>Ngày tạo tài khoản:</b> {{ Auth::user()->created_at }}</p>
                    <hr class="my-2">
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
@endsection
