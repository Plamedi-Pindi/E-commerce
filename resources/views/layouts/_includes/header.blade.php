<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <!-- Css Styles -->
    <link rel="stylesheet" href="/site/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/site/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/site/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/site/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/site/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/site/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/site/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/site/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="site/img/logo.png" alt=""></a>
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
            @guest
                <div class="header__top__right__auth">
                    <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                </div>
            @endguest

            @auth
                <a href="#">pp</a>
            @endauth
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('shop.shop-grid') }}">Loja</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="#">Shop Details</a></li>
                        <li><a href="{{ route('shop.shoppingCart') }}">Shoping Cart</a></li>
                        <li><a href="#">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contatatos</a></li>
                @auth
                    <li><a href="{{ route('Admindashboard') }}">Dashboard</a></li>
                @endauth
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                <li>Todos os produtos em promoção</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Todos os produtos em promoção</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            @guest
                                <div class="header__top__right__auth">
                                    <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                                </div>
                            @endguest

                            @auth
                                <a href="{{ route('user.logout') }}">Logout</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="{{ route('home') }}"><img src="/site/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('shop.shop-grid') }}">Loja</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="#">Shop Details</a></li>
                                    <li><a href="{{ route('shop.shoppingCart') }}">Shoping Cart</a></li>
                                    <li><a href="#">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contatos</a></li>
                            @auth
                                <li><a href="{{ route('Admindashboard') }}">Dashboard</a></li>
                            @endauth
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
