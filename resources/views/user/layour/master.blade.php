<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="{{asset('asset')}}/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('asset')}}/css/style.css">
  <link rel="stylesheet" href="{{asset('asset')}}/icon/css/all.min.css">
  <link rel="stylesheet" href="{{asset('asset')}}/assets/slick/slick.css">
  <link rel="stylesheet" href="{{asset('asset')}}/assets/slick/slick-theme.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
 </script>

</head>

<body>
 @include('user.layour.header')

 @yield('main-user')

 @include('user.layour.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
 integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="{{asset('asset')}}/assets/js/bootstrap.min.js"></script>
<script src="{{asset('asset')}}/assets/slick/slick.min.js"></script>
<script src="{{asset('asset')}}/assets/js/script.js"></script>
</body>

</html>
