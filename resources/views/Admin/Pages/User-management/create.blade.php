@extends('Admin.Layouts.master')
@section('title', 'Thêm tài khoản')
@section('main-content')
<div class="content-wrapper" style="margin-top: 50px">
    <!-- Content Header (Page header) -->
    <div class="d-flex justify-content-between align-items-center skin-blue-style shadow text-dark p-5 ">
        <div>
            <h3 class="p-0 m-0">Thêm tài khoản</h3>
            @if ($form=='admin')
            <p>Thêm mới tài khoản quản trị viên</p>
            @else
            <p>Thêm mới tài khoản người dùng</p>
            @endif
        </div>
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 bg-transparent text-dark">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-secondary">Trang chủ</a></li>
                  <li class="breadcrumb-item text-dark active" aria-current="page">Thêm tài khoản</li>
                </ol>
              </nav>
        </div>
    </div>

    <!-- Main content -->
    <section class="container-fluid">

    <!-- Default box -->
        <div class="my-5">
            <form action="{{ route('userList.store', 'form='.$form) }}" method="post" class="p-4 col-8 mx-auto shadow border border-0">
                @csrf
                <div class="form-group">
                    <label for="full_name">Tên tài khoản</label>
                    <input type="text" class="form-control" name="full_name" id="full_name"  value="{{ old("full_name") }}">
                    @error('full_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email_inp">Email</label>
                    <input type="text" class="form-control" name="email" id="email_inp"  value="{{ old("email") }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="number" class="form-control" name="phone" id="phone"  value="{{ old("phone") }}">
                    @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" id="address"  value="{{ old("address") }}">
                    @error('address')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" id="password"  value="{{ old("password") }}">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"  value="{{ old("password_confirmation") }}">
                    @error('password_confirmation')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection
