@extends('Admin.Layouts.master')
@section('title', 'Thêm mới thương hiệu')
@section('main-content')
<div class="content-wrapper" style="margin-top: 50px">
    <!-- Content Header (Page header) -->
    <div class="d-flex justify-content-between align-items-center skin-blue-style shadow text-dark p-5">
        <div>
            <h3 class="p-0 m-0">Thêm thương hiệu</h3>
            <p></p>
        </div>
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 bg-transparent text-dark">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-secondary">Trang chủ</a></li>
                  <li class="breadcrumb-item text-dark active" aria-current="page">Thêm thương hiệu</li>
                </ol>
              </nav>
        </div>
    </div>

    <!-- Main content -->
    <section class="container-fluid">

    <!-- Default box -->
        <div class="my-5">
            <form action="{{ route('brand.store') }}" method="post" class="p-4 col-8 mx-auto shadow border border-0" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name_inp">Tên thương hiệu</label>
                    <input type="text" class="form-control" name="name" id="name_inp"  value="{{ old("name") }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status" class="d-block">Trạng thái</label>
                    <label for="show" class="text-secondary">Hiện</label>
                    <input type="radio" class="mx-2" name="status" id="show" value="0" {{ old("status") == '0' ? "checked" : "" }} checked>
                    <label for="hide" class="text-secondary">Ẩn</label>
                    <input type="radio" class="mx-2" name="status" id="hide" value="1" {{ old("status") == '1' ? "checked" : "" }}>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="photo">Ảnh</label>
                    <input type="file" class="form-control" name="photo" id="photo"  value="{{ old("photo") }}">
                    @error('photo')
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
