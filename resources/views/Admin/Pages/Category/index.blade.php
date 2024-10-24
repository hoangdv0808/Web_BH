@extends('Admin.Layouts.master')
@section('title', 'Danh sách danh mục')
@section('main-content')
    <div class="content-wrapper" style="margin-top: 50px">
        <div class="d-flex justify-content-between align-items-center skin-blue-style shadow border-dark text-dark p-5">
            <div>
                <h3 class="p-0 m-0">Danh sách danh mục</h3>
                <p></p>
            </div>
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 bg-transparent text-dark">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-secondary">Trang chủ</a></li>
                      <li class="breadcrumb-item text-dark active" aria-current="page">Danh mục</li>
                    </ol>
                  </nav>
            </div>
        </div>
        <div class="d-flex p-0 pt-2 mt-4 mx-4 align-items-center border-bottom border-1">
            <a class="p-3 {{ $key == 'dm' ? 'text-danger border border-1' : 'text-dark' }} rounded-0" href="{{ route('category.index', 'key=dm') }}">
                <h4 class="p-0 m-0">Danh sách danh mục</h4>
            </a>
            <a class="p-3 {{ $key == 'dmsp' ? 'text-danger border border-1' : 'text-dark' }} rounded-0" href="{{ route('category.index', 'key=dmsp') }}">
                <h4 class="p-0 m-0">Danh mục sản phẩm</h4>
            </a>
        </div>
        <hr class="p-0 m-0 bg-dark">
        <div class="container">
            @if ($key == 'dm')
                <section class="content-header d-flex align-items-center my-5 ml-0 p-0">
                    <a href="{{ route('category.create', 'form=dm') }}" class="btn btn-success rounded-0">Thêm danh
                        mục</a>
                    <form action="{{ route('category.search') }}" method="get" class="ml-3">
                        @csrf
                        <div class="form-group d-flex align-items-center p-0 m-0">
                            <input type="text" name="key" id="" value="dm" class="d-none">
                            <input type="text" name="q" value="{{ $q }}" id="search" class="form-control rounded-0"
                                placeholder="Tìm kiếm...">
                            <button type="submit" class="btn btn-info rounded-0"><i class="fa fa-search"
                                    aria-hidden="true"></i></button>
                        </div>
                    </form>
                </section>
                <section class="">
                    <div class="">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-light-blue-gradient">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên danh mục</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoryList as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->status == 0 ? 'Hiện' : 'Ẩn' }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td class="d-flex align-items-center">
                                            <a href="{{ route('category.edit', $item->id) }}"
                                                class="btn btn-info rounded-0 mr-2">Sửa</a>
                                            <form action="{{ route('category.destroy', $item->id) }}" method="post"
                                                id="form-delete">
                                                @method('DELETE') @csrf
                                                <button type="submit" class="btn btn-danger rounded-0">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">{{ $categoryList->links() }}</div>
                        <!-- /.box -->
                    </div>
                </section>
            @else
                <section class="content-header d-flex align-items-center my-5 ml-0 p-0">
                    <a href="{{ route('category.create', 'form=dmsp') }}" class="btn btn-success rounded-0">Thêm danh
                        mục</a>
                    <form action="{{ route('category.search') }}" method="get" class="ml-3">
                        @csrf
                        <div class="form-group d-flex align-items-center p-0 m-0">
                            <input type="text" name="key" id="" value="dmsp" class="d-none">
                            <input type="text" name="q"value="{{ $q }}" id="search" class="form-control rounded-0"
                                placeholder="Tìm kiếm...">
                            <button type="submit" class="btn btn-info rounded-0"><i class="fa fa-search"
                                    aria-hidden="true"></i></button>
                        </div>
                    </form>
                </section>
                <section class="">

                    <!-- Default box -->
                    <div class="">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-light-blue-gradient">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên danh mục sản phẩm</th>
                                    <th>Trạng thái</th>
                                    <th>Danh mục cha</th>
                                    <th>Ngày tạo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoryProduct as $item)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->status == 0 ? 'Hiện' : 'Ẩn' }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td class="d-flex align-items-center">
                                            <a href="{{ route('category.edit', $item->id) }}"
                                                class="btn btn-info rounded-0 mr-2">Sửa</a>
                                            <form action="{{ route('category.destroy', $item->id) }}" method="post"
                                                id="form-delete">
                                                @method('DELETE') @csrf
                                                <button type="submit" class="btn btn-danger rounded-0">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">{{ $categoryProduct->links() }}</div>
                        <!-- /.box -->
                    </div>
                    <!-- /.box -->

                </section>
            @endif
        </div>
    </div>
@endsection
