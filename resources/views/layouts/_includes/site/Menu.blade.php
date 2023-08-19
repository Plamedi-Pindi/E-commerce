<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="{{ route('home') }}"><img src="/site/img/icon.png" alt=""><h2>Su<span>m</span>ba</h2></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>

            <li><a href="{{ route('shop.shoppingCart') }}"><i class="fa fa-shopping-bag"></i>
                    <span>{{ \Cart::getContent()->count() }}</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>{{ number_format(\Cart::getTotal(), 2, ',', '.') }} KZ</span>
        </div>
    </div>
    <div class="humberger__menu__widget">

        <div class="header__top__right__auth">
            <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="{{ route('home') }}">Home</a></li>
            <li><a href="r{{ route('shop.shop-grid') }}">Loja</a></li>
            <li><a href="{{ route('site.contatos') }}">Contatatos</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
    </div>

</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">

                </div>
                <div class="col-lg-8">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>

                        </div>
                        @guest
                            <div class="header__top__right__auth">
                                <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                            </div>
                        @endguest
                        @auth
                        <div class="dropdown">

                            <button class="btn  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Minha conta
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('Admindashboard') }}">Painel de controlo</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"></i> Sair   </a></li>
                            </ul>
                          </div>

                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="header__logo">
                    <a href="{{ route('home') }}"><img src="/site/img/icon.png" alt=""><h2>Su<span>m</span>ba</h2></a>
                </div>
            </div>
            <div class="col-lg-5">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{ route('home') }}">Home</a></li>
                        <li ><a href="{{ route('shop.shop-grid') }}">Loja</a></li>
                        <li><a href="{{ route('site.contatos') }}">Contatatos</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>

                        <li><a href="{{ route('shop.shoppingCart') }}"><i class="fa fa-shopping-bag"></i>
                                <span>{{ \Cart::getContent()->count() }}</span></a></li>
                    </ul>
                    <div class="header__cart__price">item:
                        <span>{{ number_format(\Cart::getTotal(), 2, ',', '.') }} KZ</span></div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
