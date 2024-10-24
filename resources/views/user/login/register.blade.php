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
    <link rel="stylesheet" href="{{asset('asset')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('asset')}}/icon/css/all.min.css">
</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <div class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="left-login">
                        <img src="{{asset('asset')}}/images/login/1.webp" alt="">
                    </div>
                </div>
                <div class="col-lg-6" style="margin:auto;">
                    <div class="w-full login text-center">
                        <h2>Đăng Ký</h2>
                    </div>
                    <div class="container">
                        <div class="text-center">
                            <div class="col-lg-12">
                                <div class="login-txt">
                                    <form action="" method="post">
                                        @csrf
                                        <div class="form-group login-dvh-rua">
                                            <label for="txt" class="required">{{__('Họ và Tên ') }}</label>
                                            <input type="text" name="full_name" id="txt" placeholder="Họ và Tên"  class="form-control" required>
                                            @error('full_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group login-dvh-rua">
                                            <label for="txt" class="required">Email</label>
                                            <input name="email" id="txt" type="email" placeholder="Email" class="form-control" name="email" required autocomplete="email">

                                        </div>
                                        @error('full_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group login-dvh-rua">
                                            <label for="txt" class="required">Số điện thoại</label>
                                            <input name="phone" id="txt" type="text" placeholder="Số điện thoại" class="form-control">
                                            @error('full_name')
                                              <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group login-dvh-rua pt-3">
                                            <label for="txt" class="required mm">Mật khẩu</label>
                                            <div class="d-flex">
                                                <input type="password" name="password" placeholder="Mật Khẩu"
                                                    required="" id="myInput">
                                                    @error('full_name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                <div class="eye ff" onclick="myFunction()">
                                                    <i id="hide2" class="fa-regular fa-eye-slash"></i>
                                                    <i id="hide1" class="fa-regular fa-eye"></i>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group login-dvh-rua pt-3">
                                            <label for="txt" class="required mm">Nhập lại mật khẩu</label>
                                            <div class="d-flex">
                                                <input type="password" name="password" placeholder="Mật khẩu"
                                                    required="" id="myInputs">
                                                <div class="eyes ff" onclick="myFunctions()">
                                                    <i id="hide4" class="fa-regular fa-eye-slash"></i>
                                                    <i id="hide3" class="fa-regular fa-eye"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="DN">
                                           <button type="submit">Đăng Ký</button>
                                        </div>
                                    </form>

                                </div>
                                <p class="account">Đã có tài khoản?
                                    <a href="{{route("user.login")}}" class="d-inline-block">Đặng nhập</a>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">

    </script>
    <script src="{{asset('asset')}}/assets/js/script.js"></script>

</body>

</html>
