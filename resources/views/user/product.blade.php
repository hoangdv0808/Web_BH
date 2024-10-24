@extends('user.layour.master')
@section('main-user')
    <div class="dvh_product_slider">
        <div class="ready banner-padding bg-img bg-fixed valign" style="background-image: url('{{ asset('asset')}}/images/slider/banner4.jpg') ;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-right">
                            <div class="title mt-td">
                                   <h1 class="mb-0">Sản phẩm</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dvh_sp mt-5 container d-flex justify-content-between align-items-center">
            <div>
                <h3 class="p-0 m-0 d-inline mr-1 text-uppercase">{{ $category->name }}</h3>
                <span class="small text-secondary">(Hiển thị {{ $products->count()*($page-1)+1 }} - {{ $products->count()*$page }} trong {{ $productsDefault->count() }} sản phẩm)</span>
            </div>
            <div>
                <form action="{{ route('sortProduct') }}" id="formSearch" method="get">
                    @csrf
                    <input class="d-none" type="text" name="type" value="{{ $paramType }}" id="">
                    <input class="d-none" type="text" name="name" value="{{ $paramName }}" id="">
                    <select name="sort" id="" class="form-control rounded-0" onchange="onSearch('formSearch')">
                        <option value="0" class="text-secondary">Mặc định</option>
                        <option value="1" class="text-secondary">A - Z</option>
                        <option value="2" class="text-secondary">Z - A</option>
                        <option value="3" class="text-secondary">Sắp xếp theo giá giảm dần</option>
                        <option value="4" class="text-secondary">Sắp xếp theo giá tăng dần</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="dvh_qo mt-5">
            <div class="container page-wrapper">
                <div class="page-inner">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                <div class="el-wrapper">
                                    <div class="box-up">
                                        <img class="img" src="{{ asset('storage/images') }}/{{ $product->thumbnail }}"
                                            alt="">
                                        <div class="img-info">
                                            <div class="info-inner">
                                                <p class="p-name styleText">{{ $product->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-down">
                                        <div class="h-bg">
                                            <div class="h-bg-inner"></div>
                                        </div>
                                        <a class="cart-hdv" href="{{ route('user.detail', $product->slug) }}">
                                            <span class="price-hdv">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                            <span class="add-to-cart-hdv">
                                                <span class="txt-hdv"><i class="fa fa-eye"></i>Xem chi tiết</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">{{ $products->withQueryString()->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
