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
        <form action="{{route('orders.store')}}" method="post">
          @csrf
          <div class="global">
              <div class="container">
                  <div class="row sectionheader">
                      <div class="col-xs-12 col-sm-7 col-md-7"><span>Tên Sản Phẩm</span></div>
                      <div class="col-xs-1 col-sm-1 col-md-1">Số Lượng</div>
                      <div class="col-xs-2 col-sm-2 col-md-2">Giá</div>
                      <div class="col-md-2">Tổng</div>
                  </div>
                  @foreach ($cart->list() as $key => $value)
                      <div class="product-global border-bottom mb-3">
                          <div class="row ">
                              <div class="col-xs-4 col-sm-2 col-md-2 mb-3">
                            <img src="{{  asset('storage/images')  }}/{{ $value['image'] }}" alt="" width="100%">
                              </div>
                              <div class="col-xs-8 col-sm-5 col-md-5 valign-table">
                                  <div class="valign-cell product-ncs">
                                      <div class="name-product">
                                          <strong>{{ $value['name'] }}</strong>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-xs-2 valign-table col-md-1 col-sm-1">
                                  <div class="valign-cell product-qty">{{ $value['quantity'] }}</div>
                              </div>
                              <div class="col-xs-2 valign-table col-md-2 col-sm-2">
                                  <div class="valign-cell product-price">{{ number_format($value['price']) }}</div>
                              </div>
                              <div class="col-xs-12 valign-table col-md-2 col-sm-2 ">
                                  <div class="valign-cell product-price">
                                      <div class="hidden-xs">
                                          {{ number_format($value['price'] * $value['quantity']) }}
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  @endforeach
                  <div id="itemsTotal" class="d-flex justify-content-end mb-4" width="100%">
                      <div class="col-xs-5 col-md-2  minitotals-col-caption">Tổng Các Sản Phẩm</div>
                      <div class="col-xs-6 col-md-1  minitotals-col-price">{{ number_format($cart->getTotalPrice()) }}
                      </div>
                  </div>
              </div>
          </div>
          <div class="container">
              <div class="row">
                  <div class="col-6 col-xs-12">
                      <div class="billing bg-dark">
                          Địa chỉ nhận hàng
                      </div>

                          <div class="address-form mt-4">
                              <div class="form-group">
                                  <label for="exampleInputEmail1" class="col-lg-4">Họ và Tên<i
                                          class="fa-sharp fa-solid fa-star"
                                          style="color: #ff0000;font-size: 10px;margin-left: 5px;"></i></label>
                                  <input type="text" name="name" class="form-control col-lg-8" id="exampleInputEmail1">
                                  @error('name')
                                    <div class="error_pay"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1" class="col-lg-4">Email <i class="fa-sharp fa-solid fa-star"
                                          style="color: #ff0000;font-size: 10px;margin-left: 5px;"></i></label>
                                  <input type="text" name="email" class="form-control col-lg-8" id="exampleInputEmail1">
                                  @error('email')
                                    <div class="error_pay"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1" class="col-lg-4">Số Điện Thoại<i
                                    class="fa-sharp fa-solid fa-star"
                                    style="color: #ff0000;font-size: 10px;margin-left: 5px;"></i></label>
                                    <input type="text" name="phone" class="form-control col-lg-8"
                                    id="exampleInputEmail1">
                                    @error('phone')
                                    <div class="error_pay"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>
                                  @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="col-lg-4">Địa Chỉ<i
                                              class="fa-sharp fa-solid fa-star"
                                              style="color: #ff0000;font-size: 10px;margin-left: 5px;"></i></label>
                                <input type="text" name="address" class="form-control col-lg-8" id="exampleInputEmail1">
                                @error('address')
                                    <div class="error_pay"><i class="fa-solid fa-circle-exclamation"></i>{{ $message }}</div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1" class="col-lg-4">Ghi Chú</label>
                                <input type="text" name="note" class="form-control col-lg-8"
                                    id="exampleInputEmail1">
                              </div>
                              {{-- <div class="form-check rules">
                                  <input class="form-check-input" type="checkbox" name="terms" value="" id="defaultCheck1" {{ old('terms') ? 'checked' : '' }}>
                                  <label class="form-check-label" for="defaultCheck1"> <a href="{{ route('user.privacy') }}">Chính sách bảo mật.</a>
                                  </label>
                              </div> --}}
                              {{-- @error('terms')
                              <div class="text-danger"><i class="fa-solid fa-circle-exclamation pr-2"></i>{{ $message }}</div>
                              @enderror --}}
                          </div>
                          <div class="mt-3" id="controlsRow">
                              <div class="pay-button-wrapper">
                                  <button type="submit" class="btn checkout-button-1" id="btnPay">Đặt hàng</button>
                              </div>
                          </div>
                  </div>
                  <div class="col-6">
                      <div class="thanhtoan mb-5">
                          <div class="billing bg-dark">
                              Thanh Toán
                          </div>
                          <div class="form-horizontal box-inner " id="totalsContainer">
                              <div class="row mt-5 justify-content-between">
                                  <div class="col-xs-8 ml-3 totals-col-caption">
                                      Tổng Tiền Hàng
                                  </div>
                                  <div class="col-xs-4 mr-3 totals-col-price"> {{ number_format($cart->getTotalPrice()) }} đ
                                  </div>
                              </div>
                              <div class="total-seperator"></div>
                              <div class="row justify-content-between">
                                  <div class="col-xs-8 ml-3 totals-col-caption">
                                      Phí Vận Chuyển
                                  </div>
                                  <div class="col-xs-4 mr-3 totals-col-price"> 0 ₫ </div>
                              </div>
                              <div class="total-seperator"></div>
                              <div class="row totals-row-summary justify-content-between">
                                  <div class="col-xs-8 ml-3 totals-col-caption">
                                      Tổng Số Tiền </div>
                                  <div class="col-xs-4 mr-3 totals-col-price"> {{ number_format($cart->getTotalPrice()) }} đ
                                  </div>
                              </div>
                              <div class="total-seperator"></div>
                              <div class="total-text">
                                  Tổng số tiền bạn phải trả bao gồm tất cả thuế hải quan và thuế hiện hành. Chúng tôi đảm bảo
                                  không
                                  thêm vào
                                  chi phí khi giao hàng.
                              </div>
                          </div>
                      </div>
                      <div class="billing bg-dark">
                          <div class="row justify-content-between align-items-center">
                              <div class="pay ml-3">
                                  Thanh Toán
                              </div>
                              <div class="pay-s mr-3">GIAO DỊCH MÃ HÓA AN TOÀN
                              </div>
                          </div>
                          <p class="text-dark mt-1"> Phương thức thanh toán của bạn</p>
                          <div class="card-pay">
                              <div class="pay-checkout">
                              </div>
                              <div class="check_tt">
                                  <div class="form-check">
                                      <input class="form-check-input" type="radio" name="flexRadioDefault"
                                          id="flexRadioDefault1">
                                      <label class="form-check-label" for="flexRadioDefault1">
                                          Thanh Toán Khi Nhận Hàng
                                      </label>
                                  </div>


                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </form>
    </div>
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
</body>

</html>
