@extends('Admin.Layouts.master')
@section('title', 'Trang chủ')
@section('main-content')
    <div class="content-wrapper" style="margin-top: 50px">
        <div class="d-flex justify-content-between align-items-center skin-blue-style shadow text-dark p-5">
            <div>
                <h3 class="p-0 m-0">Trang chủ</h3>
                <p></p>
            </div>
        </div>
        <div class="container">
            <section class="mt-5">
                <div class="box-info">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="item bg-maroon btn p-0 m-0 w-100">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="p-4 d-flex align-items-start flex-column">
                                        <h1 class="font-weight-bold p-0 m-0 mb-3">{{ $totalProduct }}</h1>
                                        <h3 class="p-0 m-0">Sản phẩm</h3>
                                    </div>
                                    <span class="p-4 m-0"><i class="fa fa-star" style="font-size: 90px; opacity: 0.5" aria-hidden="true"></i></span>
                                </div>
                                <a href="{{ route('product.index') }}" class="w-100 d-block text-white text-center bg-maroon-gradient py-2">
                                    <span>Xem thêm</span>
                                    <span><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="item bg-aqua btn p-0 m-0 w-100">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="p-4 d-flex align-items-start flex-column">
                                        <h1 class="font-weight-bold p-0 m-0 mb-3">{{ $totalUser }}</h1>
                                        <h3 class="p-0 m-0">Người dùng</h3>
                                    </div>
                                    <span class="p-4 m-0"><i class="fa fa-user-plus" style="font-size: 90px; opacity: 0.5" aria-hidden="true"></i></span>
                                </div>
                                <a href="{{ route('userList.index') }}" class="w-100 d-block text-white text-center bg-aqua-gradient py-2">
                                    <span>Xem thêm</span>
                                    <span><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="item bg-green btn p-0 m-0 w-100">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="p-4 d-flex align-items-start flex-column">
                                        <h1 class="font-weight-bold p-0 m-0 mb-3">{{ $totalBrand }}</h1>
                                        <h3 class="p-0 m-0">Thương hiệu</h3>
                                    </div>
                                    <span class="p-4 m-0"><i class="fa fa-bookmark" style="font-size: 90px; opacity: 0.5" aria-hidden="true"></i></span>
                                </div>
                                <a href="{{ route('brand.index') }}" class="w-100 d-block text-white text-center bg-green-gradient py-2">
                                    <span>Xem thêm</span>
                                    <span><i class="fa fa-arrow-right" aria-hidden="true"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-6">
                    <table class="table table-bordered table-hover mt-5">
                        <thead class="bg-blue-gradient">
                            <tr>
                                <th>STT</th>
                                <th>Danh mục</th>
                                <th>Số lượng sản phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categoryC2 as $item)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->product->count() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-6">
                    <table class="table table-bordered table-hover mt-5">
                        <thead class="bg-blue-gradient">
                            <tr>
                                <th>STT</th>
                                <th>Thương hiệu</th>
                                <th>Số lượng sản phẩm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brand as $item)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->product->count() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

