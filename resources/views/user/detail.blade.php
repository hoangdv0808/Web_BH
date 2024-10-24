@extends('user.layour.master')
@section('main-user')
    <div class="ready banner-padding bg-img bg-fixed valign mb-5">
        <img src="{{ asset('asset') }}/images/slider/banner1.webp" alt="" width="100%">
    </div>
    <div class="card-wrapper">
        <div class="card detail-card">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="box-detail-images">
                            <div class="">
                                <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                                <img id="expandedImg" src="{{ asset('storage/images') }}/{{ $product->thumbnail }}" style="width:100%"/>
                                <div id="imgtext"></div>
                            </div>
                            <div class="row box-images">
                                <div class="column">
                                    <img width="100px" src="{{ asset('storage/images') }}/{{ $product->thumbnail }}" alt="Nature" onclick="handleClickImage(this);">
                                </div>
                                @foreach ($product->images()->get() as $item)
                                    <div class="column">
                                        <img width="100px" src="{{ asset('storage/images') }}/{{ $item->thumbnail }}" alt="Nature" onclick="handleClickImage(this);">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-description">
                            <div class="project-title">
                                <h2 class="h2-lg">{{ $product->name }}</h2>
                                <div class="stars-rating">
                                    <span>4.38</span>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>


                                <div class="project-price">
                                    <h4 class="h4-xl yellow-color">
                                        <span class="old-price">{{ number_format($product->price, 0, ',', '.') }}đ</span>
                                        {{ number_format($product->sale_price, 0, ',', '.') }}đ
                                    </h4>
                                </div>
                                <div class="dl">Dung Lượng : {{ $product->capacity }}</div>
                            </div>
                            <div class="product-txt">
                                <ul class="txt-list mt-3">
                                    <li class="list-item">
                                        <p class="p-sm">Chúng tôi chấp nhận thẻ tín dụng hoặc tiền mặt cho người chuyển
                                            phát nhanh</p>
                                    </li>
                                    <li class="list-item">
                                        <p class="p-sm">Phí vận chuyển là 30.000 (Miễn phí khi mua từ 1Triệu)</p>
                                    </li>
                                    <li class="list-item">
                                        <p class="p-sm">Đặt hàng trước buổi trưa để giao hàng trong ngày</p>
                                    </li>
                                </ul>
                                <form action="{{ route('user.cart.add') }}" method="POST">
                                  @csrf
                                    <div class="purchase-info mt-5 boe">
                                        <div class="purchase mt-4">
                                            <p>Số lượng :</p>
                                            <div class="product-quantity">
                                                <span class="decrease">-</span>
                                                <input type="text" name="quantity" class="quantity" value="1">
                                                <span class="increase">+</span>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <div class="">
                                        <div class="mt-4 add_to_cart">
                                            <button type="submit" class="btn text-white">
                                                Thêm vào giỏ hàng <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                    height="20" fill="currentColor" class="bi bi-cart mb-1 pl-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                </svg></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="mo_ta mt-5 sticky">
        <div class="container xam">
            <h3 class="Iv7FJp p-0 m-0">Chi tiết Sản Phẩm</h3>
            <div class="MCCLkq">
                <div class="f7AU53">
                    <p class="irIKAp">Mô tả sản phẩm
                        {{ $product->name }}
                        {{ $product->description }}
                        -- Rất được khách hàng trẻ say mê yêu thích, cam kết an toàn sức khỏe
                        ✔️Chất Liệu: {{ $product->ingredients }}.
                        ✔️ Dung Lượng : {{ $product->capacity }}
                        ✔️ Thương Hiệu: {{ $product->brand->name }}
                        -Bảo hành : 3 Tháng.
                        -Giao hàng tận nơi trên toàn quốc.
                        -Cam kết sản phẩm y hình.
                        CHÚNG TÔI LUÔN ĐẶT SỰ HÀI LÒNG CỦA KHÁCH HÀNG VÀ UY TÍN HÀNG ĐẦU
                        NÓI KHÔNG VỚI SẢN PHẨM GIÁ RẺ CHẤT LIỆU KÉM
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="dvh_qo  mt-5">
        <div class="container">
            <h2>Sản phẩm liên quan</h2>
            <div class="row">
                @foreach ($related as $value)
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-3">
                        <div class="el-wrapper">
                            <div class="box-up">
                                <img class="img" src="{{ asset('storage/images') }}/{{ $value->thumbnail }}" alt="">
                                <div class="img-info">
                                    <div class="info-inner">
                                        <p class="p-name styleText">{{ $value->name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="box-down">
                                <div class="h-bg">
                                    <div class="h-bg-inner"></div>
                                </div>
                                <a class="cart-hdv" href="{{ route('user.detail', $value->slug) }}">
                                    <span class="price-hdv">{{ number_format($value->price, 0, ',', '.') }}đ</span>
                                    <span class="add-to-cart-hdv">
                                        <span class="txt-hdv"><i class="fa fa-eye" aria-hidden="true"></i>Xem chi tiết</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.box-images').slick({
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
