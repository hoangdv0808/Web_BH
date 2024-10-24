<header class="header-bg">
    <div class="mt-4">
        <div class="container-fluid">
            <div class="row header-page-dvh justify-content-between">
                <div class="logo-page ">
                    <a class="logo ml-5" href="{{ route('user.home') }}">
                        <img src="{{ asset('asset') }}/images/logo/logo.png" alt="logo">
                    </a>
                </div>
                <div class="menu-header-page position-static">
                    <div class="row h-100">
                        <nav class="navbar-expand-sm navbar-light">
                            <div class="collapse h-100 header-menu menu-main navbar-collapse" id="collapsibleNavId">
                                <ul class="navbar-nav h-100 mr-auto mt-2 mt-lg-0">
                                    @foreach ($categories as $category)
                                        <li class="nav-item menu-dow">
                                            <a class="nav-link text-dark z-dvh fs-20 text-uppercase"
                                                href="{{ route('category', ['type'=>$category->slug, 'name'=>'all']) }}">{{ $category->name }}</a>
                                            <div class="megamenu w-100">
                                                @if($category->categories()->get() && $category->categories()->get()->count()>0)
                                                    <ul class="row">
                                                        @foreach($category->categories()->get() as $item)
                                                            <li class="dip-menu col-lg-2 col-md-2">
                                                                <a class="text-uppercase" href="{{ route('category',['type'=>$category->slug, 'name'=>$item->slug]) }}">{{ $item->name }}</a>
                                                                </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                    <li class="nav-item">
                                        <a class="nav-link text-dark z-dvh fs-20 text-uppercase" href="{{ route('user.contact') }}">Hỗ
                                            Trợ</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>

                <div class=" position-static" style="z-index:99;">
                    <div class="row mr-5 justify-content-end">
                        <div class="mr-5 search-container">
                            <i class="fa fa-search  miicon"></i>
                            <i class="fa fa-times dong"></i>

                        </div>
                        <div class="search ">
                            <form action="{{ route('user.search') }}" method="GET">
                                @csrf
                                <div class="d-flex my-5 search-dvh mx-3">
                                    <button type="submit" class="bt-search">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    <input class="search-input ml-3 mb-2" name="searchTerm" type="text"
                                        placeholder="Tìm Kiếm......">
                                </div>
                            </form>
                        </div>
                        <div class="row ">
                            <div class=" mb-4 mt-2 carts">
                                <a href="{{ route('user.cart') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="30" height="30" fill="currentColor" class="bi bi-cart"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                    <span class="quanti">{{ $cart->getTotalQuantity() }}</span>
                                </a>
                            </div>
                            <div class=" mb-4 mt-2 pd-0 h-100">
                                <div class="login ">
                                    <span class=" ">
                                        @if (Auth::check())
                                            <div class="logout">
                                                <div class="nn">
                                                    <a href="{{ route('user.project') }}">
                                                        <i class="fa-regular fa-user"></i>
                                                    </a>
                                                </div>

                                            </div>
                                        @else
                                            <p>
                                                <a href="{{ route('user.login') }}"><i
                                                        class="fa-regular fa-user"></i></a>
                                            </p>
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="menu-toggle mb-4 ml-4 mt-2">
                                <i class="fa-solid fa-bars"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
{{-- <div id="loading"></div> --}}
<script>
    var menuicon = document.querySelector('.menu_mobile_icon i');
    var menu = document.querySelector('.menu_mobile');
    var closeButton = document.querySelector('.close_menu_mobile');

    menuicon.addEventListener('click', function() {
        menu.classList.add("active");
    });

    closeButton.addEventListener('click', function() {
        menu.classList.remove('active');
    });
</script>
