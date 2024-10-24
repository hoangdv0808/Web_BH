@extends('Admin.Layouts.master')
@section('title', 'Danh sách các thương hiệu')
@section('main-content')
    <div class="content-wrapper" style="margin-top: 50px">
        <div class="d-flex justify-content-between align-items-center skin-blue-style shadow text-dark p-5">
            <div>
                <h3 class="p-0 m-0">Danh sách các thương hiệu</h3>
                <p></p>
            </div>
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 bg-transparent text-dark">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-secondary">Trang chủ</a></li>
                      <li class="breadcrumb-item text-dark active" aria-current="page">Thương hiệu</li>
                    </ol>
                  </nav>
            </div>
        </div>
        <div class="container">
            <section class="content-header d-flex align-items-center p-0 my-5 ml-0 p-0">
                <a href="{{ route('brand.create') }}" class="btn btn-success rounded-0">Thêm thương hiệu</a>
                <form action="{{ route('brand.search') }}" method="get" class="ml-3">
                    @csrf
                    <div class="form-group d-flex align-items-center p-0 m-0">
                        <input type="text" name="q" id="search" value="{{ $q }}"  class="form-control rounded-0"
                            placeholder="Tìm kiếm...">
                        <button type="submit" class="btn btn-info rounded-0"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
                    </div>
                </form>
                <a href="{{ route('brand.index') }}" class="btn btn-dark rounded-0 ml-3">Mặc định</a>
            </section>
            <section class="">

                <!-- Default box -->
                <div class="">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-light-blue-gradient">
                            <tr>
                                <th>STT</th>
                                <th>Tên thương hiệu</th>
                                <th>Trạng thái</th>
                                <th>Ảnh</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brand as $item)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->status == 0 ? 'Hiện' : 'Ẩn' }}</td>
                                    <td>
                                        <img src="{{ asset('storage/images/'.$item->thumbnail) }}" alt="" width="50px">
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('brand.edit', $item->id) }}"
                                            class="btn btn-info rounded-0 mr-2">Sửa</a>
                                        <form action="{{ route('brand.destroy', $item->id) }}" method="post"
                                            id="form-delete">
                                            @method('DELETE') @csrf
                                            <button type="submit" class="btn btn-danger rounded-0">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- /.box -->
                    <div class="text-center">{{ $brand->links() }}</div>
                </div>
                <!-- /.box -->

            </section>

        </div>
    </div>
@endsection
