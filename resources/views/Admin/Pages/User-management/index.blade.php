@extends('Admin.Layouts.master')
@section('title', 'Quản lí người dùng')
@section('main-content')
    <div class="content-wrapper" style="margin-top: 50px">
        <div class="d-flex justify-content-between align-items-center skin-blue-style shadow text-dark p-5">
            <div>
                <h3 class="p-0 m-0">Quản lý người dùng</h3>
                <p></p>
            </div>
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 bg-transparent text-dark">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-secondary">Trang chủ</a></li>
                      <li class="breadcrumb-item text-dark active" aria-current="page">Tài khoản</li>
                    </ol>
                  </nav>
            </div>
        </div>
        {{-- <section class="content-header d-flex align-items-center">
            <a href="{{ route('userList.create') }}" class="btn btn-success rounded-0">Thêm tài khoản</a>
            <form action="{{ route('userList.search') }}" method="get" class="ml-3">
                @csrf
                <div class="form-group d-flex align-items-center p-0 m-0">
                    <input type="text" name="q" id="search" value="{{ $q }}"  class="form-control rounded-0"
                        placeholder="Tìm kiếm...">
                    <button type="submit" class="btn btn-info rounded-0"><i class="fa fa-search"
                            aria-hidden="true"></i></button>
                </div>
            </form>
            <a href="{{ route('userList.index') }}" class="btn btn-dark rounded-0 ml-3">Mặc định</a>
        </section> --}}
        <section class="">

            <!-- Default box -->
            <div class="container-fluid">
                <div class="row justify-content-between">
                    <div class="col-lg-6 mt-5">
                        <div class="border border-1 shadow">
                            <span class="d-flex align-items-center justify-content-between bg-light-blue px-3 py-2">
                                <h4>Tài khoản quản trị viên</h4>
                                <a href="{{ route('userList.create', 'form=admin') }}"><span class="rounded-circle bg-white d-block py-2 px-3"><i class="fa fa-plus text-black"></i></span></a>
                            </span>
                            <span>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="col-1">STT</th>
                                            <th class="col-2">Tên</th>
                                            <th class="col-3">Email</th>
                                            <th class="col-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userAcc as $item)
                                            <tr>
                                                <td scope="row">{{ $loop->iteration }}</td>
                                                <td>{{ $item->full_name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td class="d-flex align-items-center justify-content-end">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#modelId{{ $item->id }}">
                                                      <i class="fa fa-eye"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modelId{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Chi tiết tài khoản</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h3>Tên tài khoản: {{ $item->full_name }}</h3>
                                                                    <p>Email: {{ $item->email }}</p>
                                                                    <p>Số điện thoại: {{ $item->phone }}</p>
                                                                    <p>Địa chỉ: {{ $item->address }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('userList.edit', $item->id) }}"><i class="fa fa-edit text-black"></i></a>
                                                    <form action="{{ route('userList.destroy', $item->id) }}" method="post" id="form-delete">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn rounded-0"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-5">
                        <div class="border border-1 shadow">
                            <span class="d-flex align-items-center justify-content-between bg-light-blue px-3 py-2">
                                <h4>Tài khoản khách hàng</h4>
                                <a href="{{ route('userList.create', 'form=user') }}"><span class="rounded-circle bg-white d-block py-2 px-3"><i class="fa fa-plus text-black"></i></span></a>
                            </span>
                            <span>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="col-1">STT</th>
                                            <th class="col-2">Tên</th>
                                            <th class="col-3">Email</th>
                                            <th class="col-1"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($adminAcc as $item)
                                            <tr>
                                                <td scope="row">{{ $loop->iteration }}</td>
                                                <td>{{ $item->full_name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td class="d-flex align-items-center justify-content-end">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-lg" data-toggle="modal" data-target="#modelId{{ $item->id }}">
                                                      <i class="fa fa-eye"></i>
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modelId{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Chi tiết tài khoản</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h3>Tên tài khoản: {{ $item->full_name }}</h3>
                                                                    <p>Email: {{ $item->email }}</p>
                                                                    <p>Số điện thoại: {{ $item->phone }}</p>
                                                                    <p>Mật khẩu: {{ $item->password }}</p>
                                                                    <p>Địa chỉ: {{ $item->address }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('userList.edit', $item->id) }}"><i class="fa fa-edit text-black"></i></a>
                                                    <form action="{{ route('userList.destroy', $item->id) }}" method="post" id="form-delete">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn rounded-0"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -->

        </section>
    </div>
@endsection
