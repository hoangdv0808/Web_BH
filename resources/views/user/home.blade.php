@extends('user.layour.master')
@section('main-user')
    <div class="slider">

        <div id="carouselId" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                <li data-target="#carouselId" data-slide-to="1"></li>
                <li data-target="#carouselId" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox" style="height: 90vh">
                <div class="carousel-item active">
                    <img src="{{ asset('asset') }}/images/slider/banner1.webp" alt="First slide" width="100%">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('asset') }}/images/slider/banner4.jpg" alt="Second slide" width="100%">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('asset') }}/images/slider/banner3.webp" alt="Third slide" width="100%">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="outstanding mt-5">
        <div class="container">
            <h2>Sản phẩm mới nhất</h2>
            <div class="page-inner">
                <div class="row">
                    @foreach ($products as $value)
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="el-wrapper">
                                <div class="box-up">
                                    <img class="img" src="{{ asset('storage/images') }}/{{ $value->thumbnail }}"
                                        alt="">
                                    <div class="img-info">
                                        <div class="info-inner">
                                            <p class="p-name styleText p-0 m-0"> {{ $value->name }} </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-down">
                                    <div class="h-bg">
                                        <div class="h-bg-inner"></div>
                                    </div>
                                    <a class="cart-hdv" href="{{ route('user.detail', $value->slug) }}">
                                        @if ($value->sale_price > 0)
                                            <span class="price-hdv">{{ number_format($value->sale_price, 0, ',', '.') }}đ</span>
                                        @else
                                            <span class="price-hdv">{{ number_format($value->price, 0, ',', '.') }}đ</span>
                                        @endif
                                        <span class="add-to-cart-hdv">
                                            <span class="txt-hdv"><i class="fa fa-eye" aria-hidden="true"></i> Xem chi tiết</span>
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
    <div class="container my-5">
        <h2>Các sản phẩm đang bán</h2>
        <div class="box-cate">
            <nav>
                <div class="nav nav-tabs border-0 d-flex justify-content-center" id="nav-tab" role="tablist">
                    @foreach ($listCategory as $category)
                        <a class="nav-item nav-link border-0 {{ $loop->iteration == 1 ? 'active' : '' }}" id="nav-{{ $category->id }}-tab" data-toggle="tab" href="#nav-{{ $category->id }}" role="tab" aria-controls="nav-{{ $category->id }}" aria-selected="true">{{ $category->name }}</a>
                    @endforeach
                </div>
            </nav>
              <div class="tab-content" id="nav-tabContent">
                    @foreach ($listCategory as $category)
                        <div class="tab-pane fade {{ $loop->iteration == 1 ? 'show active' : '' }}" id="nav-{{ $category->id }}" role="tabpanel" aria-labelledby="nav-{{ $category->id }}-tab">
                            <div class="box-prd">
                                <div class="row">
                                    @foreach ($category->categories()->paginate(4) as $cateChild)
                                        @foreach ($cateChild->product()->paginate(2) as $value)
                                            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                                                <div class="el-wrapper">
                                                    <div class="box-up">
                                                        <img class="img" src="{{ asset('storage/images') }}/{{ $value->thumbnail }}"
                                                            alt="">
                                                        <div class="img-info">
                                                            <div class="info-inner">
                                                                <p class="p-name styleText p-0 m-0"> {{ $value->name }} </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="box-down">
                                                        <div class="h-bg">
                                                            <div class="h-bg-inner"></div>
                                                        </div>
                                                        <a class="cart-hdv" href="{{ route('user.detail', $value->slug) }}">
                                                            @if ($value->sale_price > 0)
                                                                <span class="price-hdv">{{ number_format($value->sale_price, 0, ',', '.') }}đ</span>
                                                            @else
                                                                <span class="price-hdv">{{ number_format($value->price, 0, ',', '.') }}đ</span>
                                                            @endif
                                                            <span class="add-to-cart-hdv">
                                                                <span class="txt-hdv"><i class="fa fa-eye" aria-hidden="true"></i> Xem chi tiết</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
              </div>
        </div>
    </div>
    
    <section class="container">
        <div class="box-brand my-3">
            @foreach ($brands as $item)
                <div class="">
                    <span class="d-flex align-items-center m-auto" style="width: 200px; height: 200px">
                        <img class="w-100 m-auto" src="{{ asset('storage/images') }}/{{ $item->thumbnail }}" alt="">
                    </span>
                </div>
            @endforeach
        </div>
    </section>
    @if(session('alert') == 'success')
        <script>
            alert('Đơn hàng của bạn đã được đặt thành công!');
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $('.box-brand').slick({
            dots: true,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            responsive: [
                {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll: 6,
                    infinite: true,
                    dots: true
                }
                },
                {
                breakpoint: 600,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                }
                },
                {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
            });
        });
    </script>
@endsection
