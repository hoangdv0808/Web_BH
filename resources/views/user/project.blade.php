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
        <div class="container">
            <div class="d-flex flex-column project-name align-center">
                <h2 class="">Hi {{ Auth::user()->full_name }}</h2>
            </div>
        </div>
        <div class="css-1f4kde2 e1byjllo0">
            <div class="css-1fxnizg e1os33rx0">
                <div class="css-1y5nre3 e1os33rx3">
                    <h3 class="css-o9224i e1os33rx1">Chi tiết hồ sơ</h3>
                </div>
                <div>
                    <div class="css-1ivhndf e28jal1">
                        <ul class="css-nm3p7o e28jal0">
                            <li>Họ và tên</li>
                            <li class="css-1egv7wc e28jal2h">{{ Auth::user()->full_name }}</li>
                        </ul>
                        <ul class="css-nm3p7o e28jal0">
                            <li>Email</li>
                            <li class="css-1egv7wc e28jal2">{{ Auth::user()->email }}</li>
                        </ul>
                        <ul class="css-nm3p7o e28jal0">
                            <li>Số Điện Thoại</li>
                            <li class="css-1egv7wc e28jal2">{{ Auth::user()->phone }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="css-1fxnizg e1os33rx0">
                <div class="css-1y5nre3 e1os33rx3">
                    <h3 class="css-o9224i e1os33rx1">Chúng tôi có thể giúp gì cho bạn?</h3>
                </div>
                <div>
                    <p class="css-6kv2ec eupdsmj0">Chúng tôi cung cấp hỗ trợ trên toàn thế giới 24 giờ một ngày, bảy
                        ngày một tuần. Xin lưu ý, chúng tôi có thể theo dõi hoặc ghi lại thông tin liên lạc của bạn cho
                        mục đích đào tạo và kiểm soát chất lượng.</p>
                    <div class="css-1t89fgk e28jal1">
                        <ul class="css-1tcbvz9 e28jal0">
                            <li>Số Điện Thoại</li>
                            <li class="css-uq1f55 e28jal2">
                                <a href="" class="css-fdtj4q efm9qbj1">+84 (0) 389 502 096</a>
                            </li>
                        </ul>
                        <ul class="css-1tcbvz9 e28jal0">
                            <li>Email</li>
                            <li class="css-uq1f55 e28jal2">
                                <a href="" class="css-fdtj4q efm9qbj1">hoangdang8826@gmail.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="w-100 text-center">
                <a class="loguot " href="{{ route('user.logout') }}"><i class="fa-solid fa-right-to-bracket"></i>Đăng Xuất</a>
            </div>
        </div>
        @include('user.layour.footer')
