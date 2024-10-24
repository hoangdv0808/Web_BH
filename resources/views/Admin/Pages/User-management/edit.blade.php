@extends('Admin.Layouts.master')
@section('title', 'Sửa tài khoản')
@section('main-content')
<div class="content-wrapper" style="margin-top: 50px">
    <!-- Content Header (Page header) -->
    <div class="d-flex justify-content-between align-items-center skin-blue-style shadow text-dark p-5 ">
        <div>
            <h3 class="p-0 m-0">Sửa tài khoản</h3>
            @if ($account->role == 1)
            <p>Sửa tài khoản quản trị viên</p>
            @else
            <p>Sửa tài khoản người dùng</p>
            @endif
        </div>
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 bg-transparent text-dark">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-secondary">Trang chủ</a></li>
                  <li class="breadcrumb-item text-dark active" aria-current="page">Sửa tài khoản</li>
                </ol>
              </nav>
        </div>
    </div>

    <!-- Main content -->
    <section class="container-fluid">

    <!-- Default box -->
        <div class="my-5">
            <form action="{{ route('userList.update', $account->id) }}" method="post" class="p-4 col-8 mx-auto shadow border border-0">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="full_name">Tên tài khoản</label>
                    <input type="text" class="form-control" name="full_name" id="full_name"  value="{{ old("full_name") ?? $account->full_name }}">
                    @error('full_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email_inp">Email</label>
                    <input type="text" class="form-control" name="email" id="email_inp"  value="{{ old("email") ?? $account->email }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="number" class="form-control" name="phone" id="phone"  value="{{ old("phone") ?? $account->phone }}">
                    @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" id="address"  value="{{ old("address") ?? $account->address }}">
                    @error('address')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection
