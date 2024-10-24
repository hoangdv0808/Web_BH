<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('asset') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('asset') }}/icon/css/all.min.css">
</head>

<body>

    <div class="cart">
        <div class="header-cart my-5 d-flex">
            <div class="return pl-5">
                <a href="javascript:history.back()"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div class="cart-logo m-a text-center">
                <a href="index.php">
                    <img src="{{ asset('asset') }}/images/logo/logo.png" alt="">
                </a>
            </div>
        </div>
        <div class="cart-shopping">
            <div class="container-fluid">
                <h1 class="text-center mb-5">GIỎ HÀNG ({{ $cart->getTotalQuantity() }})</h1>
                <div class="row">
                    <div class="col-lg-7">
                        @if ($cart->getTotalQuantity() == 0)
                            <h2 class="text-secondary text-center">Không có sản phẩm nào trong giỏ hàng</h2>
                        @endif
                        @foreach ($cart->list() as $key => $value)
                            <div class="shopping_bag_left">
                                <div class="row">
                                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ml-3">
                                        <div class="product-img">
                                            <img src="{{ asset('storage/images') }}/{{ $value['image'] }}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 ">
                                        <div class="right_name ml-5">
                                            <div class="name_product">
                                                <a href="">
                                                    <h2>{{ $value['name'] }}</h2>
                                                </a>
                                            </div>
                                            <div class="item">
                                                <p>Sản phẩm :<span>80726661</span> </p>
                                            </div>
                                            <div class="dvh_item d-flex">
                                                <p class="dvh_itemGroud mr-3">Số lượng: {{ $value['quantity'] }}</p>
                                                <p class="ml-3">
                                                    <a class="yellow" data-toggle="modal" data-target="#prd{{ $value['productId'] }}"
                                                        href="">Sửa</a>
                                                <div class="modal" id="prd{{ $value['productId'] }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title">Sửa Sản Phẩm</h1>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal">×</button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                                                            <img src="{{ asset('storage/images') }}/{{ $value['image'] }}"
                                                                                alt="Product Image" width="100%">
                                                                        </div>
                                                                        <div
                                                                            class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                                                                            <div class="product-content">
                                                                                <h4 class="product-title">
                                                                                    {{ $value['name'] }}</h4>
                                                                                @foreach ($cart->list() as $key => $value)
                                                                                    <form
                                                                                        action="{{ route('user.cart.update', ['id' => $key]) }}"
                                                                                        method="post"
                                                                                        id="updateQuantityForm">
                                                                                        @csrf
                                                                                        @method('PATCH')
                                                                                        <div
                                                                                            class="purchase-info d-flex save_dvh">
                                                                                            <div class="purchase-info">
                                                                                                <div
                                                                                                    class="purchase mt-4">
                                                                                                    <p>Số lượng :</p>
                                                                                                    <div
                                                                                                        class="product-quantity">
                                                                                                        <span
                                                                                                            type="button"
                                                                                                            class="decrease">-</span>
                                                                                                        <input
                                                                                                            type="text"
                                                                                                            class="quantity"
                                                                                                            name="quantity"
                                                                                                            value="{{ $value['quantity'] }}">
                                                                                                        <span
                                                                                                            type="button"
                                                                                                            class="increase">+</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="save mt-4">
                                                                                            <button type="submit"
                                                                                                class="btn btn-primary">Lưu</button>
                                                                                        </div>
                                                                                    </form>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                </p>
                                            </div>
                                            <div class="create_delete d-flex">
                                                <div class="delete_product">
                                                    <form action="{{ route('user.cart.remove', ['id' => $key]) }}"
                                                        method="POST" onsubmit="return confirmDelete()">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit">Xóa khỏi giỏ hàng</button>
                                                    </form>
                                                </div>
                                                <div class="price">
                                                    <strong>{{ number_format($value['price'] * $value['quantity']) }}<sup>đ</sup></strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-4">
                        <div class="shopping-bag_columnBlock__aUQEU">
                            <div class="shopping-bag_shoppingBagTotals__9AP_7 mb-5">
                                <ul>
                                    <li class="totals_totalsItem__AQ7UZ">
                                        <span class="totals_totalsItemName__S232F">Tổng Tiền Hàng</span></span>
                                        <span class="totals_totalsItemValue__NEENh"
                                            style="visibility: visible;">{{ number_format($cart->getTotalPrice()) }}<sup>đ</sup></span>
                                    </li>
                                    <li class="totals_totalsItem__AQ7UZ mb-3">
                                        <span class="totals_totalsItemName__S232F">Tổng Phí Vận Chuyển</span>
                                        <span class="totals_totalsItemValue__NEENh">Miễn phí</span>
                                    </li>
                                    <li class="totals_totalsItem__AQ7UZ">
                                        <span class="totals_totalsItemName__S232F">Tổng Thanh Toán</span>
                                        <span class="totals_totalsItemValue__NEENh"
                                            style="visibility: visible;">{{ number_format($cart->getTotalPrice()) }}<sup>đ</sup></span>
                                    </li>
                                </ul>
                                <div class="default-cta-button_checkoutButtonWrapper__mq0PV">
                                    <a href="{{ route('user.pay') }}">
                                        <button class=" css-1at524u e6yz8z0" type="button">Thủ tục thanh
                                            toán({{ $cart->getTotalQuantity() }})</button>
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="shopping-bag_columnBlock__aUQEU">
                            <div
                                class="delivery-and-returns_deliveryAndReturns__bkhnu shopping-bag_deliveryAndReturns__Cqe8g">
                                <div class="default_deliveryAndReturnsTitle__z6atJ d-flex">
                                    <span class="icon icon--glyph-delivery icon--size-none">
                                        <svg class="icon__content" viewBox="0 0 1 1" focusable="false"
                                            width="20" height="20">
                                            <title>delivery</title>
                                            <path
                                                d="M.06.12L0 .24V1h1V.24L.94.12.88 0H.12L.06.12m.1.03A.52.52 0 00.13.2h.32V.1H.18L.16.15m.39 0V.2h.32L.845.15.82.1H.55v.05M0 .62V.43v.19M.1.6v.3h.8V.3H.1v.3M.35.45V.5h.3V.4h-.3v.05"
                                                fill="currentColor" fill-rule="evenodd"></path>
                                        </svg></span>
                                    <h2 class="default_deliveryAndReturnsTitleText__i89oh typography--l3">
                                        Giao hàng và trả hàng miễn phí</h2>
                                </div>
                                <p class="mt-1">Mua sắm với sự tự tin với chính sách trả hàng miễn phí.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user.layour.footer')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="{{ asset('asset') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('asset') }}/assets/slick/slick.min.js"></script>
    <script src="{{ asset('asset') }}/assets/js/script.js"></script>
    <script>
        function confirmDelete() {
            return confirm('Bạn có muốn xóa sản phẩm khỏi giỏ hàng không?');
        }
        $(document).ready(() => {
            var quantityInput = document.querySelector('.quantity');
            var decreaseButton = document.querySelector('.decrease');
            var increaseButton = document.querySelector('.increase');

            decreaseButton.addEventListener('click', function() {
                var currentQuantity = parseInt(quantityInput.value, 10);
                if (currentQuantity > 1) {
                    quantityInput.value = currentQuantity - 1;
                }
            });

            increaseButton.addEventListener('click', function() {
                var currentQuantity = parseInt(quantityInput.value, 10);
                quantityInput.value = currentQuantity + 1;
            });
        });
    </script>
</body>

</html>
