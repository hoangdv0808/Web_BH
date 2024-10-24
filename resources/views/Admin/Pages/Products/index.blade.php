@extends('Admin.Layouts.master')
@section('title', 'Danh sách sản phẩm')
@section('main-content')
    <div class="content-wrapper" style="margin-top: 50px">
        <div class="d-flex justify-content-between align-items-center skin-blue-style shadow text-dark p-5">
            <div>
                <h3 class="p-0 m-0">Danh sách sản phẩm</h3>
                <p></p>
            </div>
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 bg-transparent text-dark">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-secondary">Trang chủ</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Danh sách sản phẩm</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container">
            <section class="p-0 m-0 content-header d-flex align-items-center my-5">
                <a href="{{ route('product.create') }}" class="btn btn-success rounded-0">Thêm sản phẩm</a>
                <form action="{{ route('product.search') }}" method="get" class="ml-3">
                    @csrf
                    <div class="form-group d-flex align-items-center p-0 m-0">
                        <input type="text" name="q" id="search" value="{{ $q }}"  class="form-control rounded-0"
                            placeholder="Tìm kiếm...">
                        <button type="submit" class="btn btn-info rounded-0"><i class="fa fa-search"
                                aria-hidden="true"></i></button>
                    </div>
                </form>
                <a href="{{ route('product.index') }}" class="btn btn-dark rounded-0 ml-3">Mặc định</a>
            </section>
            <section class="">

                <!-- Default box -->
                <div class="">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-light-blue-gradient">
                            <tr>
                                <th class="">STT</th>
                                <th class="col-3">Tên sản phẩm</th>
                                <th class="col-1">Giá</th>
                                <th class="col-1">Loại</th>
                                <th class="col-2">Thương hiệu</th>
                                <th class="col-2">Dung lượng</th>
                                <th class="col-1">Ảnh</th>
                                {{-- <th class="col-1">Ảnh mô tả</th> --}}
                                <th class="col-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $item)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <div>
                                           @if ($item->sale_price > 0)
                                                <span class="d-block">{{ number_format($item->sale_price) }} <sup>đ</sup></span>
                                                <del>{{ number_format($item->price) }} <sup>đ</sup></del>
                                           @else
                                                <span class="d-block">{{ number_format($item->price) }} <sup>đ</sup></span>
                                           @endif
                                        </div>

                                    </td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->brand->name }}</td>
                                    <td>{{ $item->capacity }}</td>
                                    {{-- <td>
                                        <img src="{{ asset('storage/images/'.$item->thumbnail) }}" alt="" width="70px" height="70px" style="object-fit: cover">
                                    </td> --}}
                                    <td>
                                        <div id="carouselExampleControls{{ $item->id }}" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" >
                                                <div class="carousel-item active">
                                                    <img src="{{ asset('storage/images/'.$item->thumbnail) }}" alt="" class="d-block w-100" height="100px" style="object-fit: cover">
                                                </div>
                                                @foreach ($item->images as $key => $image)
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" height="100px" src="{{ asset('storage/images/'.$image->thumbnail) }}" alt="First slide" style="object-fit: cover">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleControls{{ $item->id }}" role="button" data-slide="prev">
                                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls{{ $item->id }}" role="button" data-slide="next">
                                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                              <span class="sr-only">Next</span>
                                            </a>
                                          </div>
                                    </td>
                                    <td class="d-flex align-items-center">
                                        <a href="{{ route('product.edit', $item->id) }}"
                                            class="btn btn-info rounded-0 mr-2">Sửa</a>
                                        <form action="{{ route('product.destroy', $item->id) }}" method="post"
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
                    <div class="text-center">{{ $product->links() }}</div>
                </div>
                <!-- /.box -->

            </section>

        </div>
    </div>
@endsection

