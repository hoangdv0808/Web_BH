@extends('user.layour.master')
@section('main-user')

    <div class="dvh_product_slider">
        @if ($results->isEmpty())
           <div class="search-no">
              <h1>Không tìm thấy sản phẩm </h1>
           </div>
        @else
        <div class="dvh_qo mt-5">
            <div class="container">
                <div class="hhh ">
                    <h2>Tìm kiếm</h2>
                    <h4>Có {{ $count }} sản phẩm</h4>
                </div>
            </div>
            <div class="container page-wrapper">
                <div class="page-inner">
                    <div class="row">
                        @foreach ($results as $product)
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
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
