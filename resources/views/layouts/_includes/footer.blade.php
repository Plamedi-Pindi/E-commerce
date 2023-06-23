    <!-- Footer Section Begin -->

    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo ">
                            <a href="{{ route('home') }}"><img src="/site/img/icon.png" alt=""><h2>Su<span>m</span>ba</h2></a>
                        </div>
                        <ul>
                            <li>Endereço: 60-49 Mutamba</li>
                            <li>Phone: +244 926477947</li>
                            <li>Email: sumba@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget footer_menu">
                        <h6>Menu</h6>
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('shop.shop-grid') }}">Loja</a></li>
                            <li><a href="#">contatos</a></li>

                        </ul>

                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Siga-nos nas redes socias</h6>

                        <div class="footer__widget__social">
                            <a href="https://www.facebook.com/profile.php?id=100093558973954"><i class="fa fa-facebook"></i></a>
                            <a href="https://instagram.com/p.m.n.pindi?igshid=ZGUzMzM3NWJiOQ=="><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> Todos os direitos reservados | Sumba
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="site/img/payment-item.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="/site/js/jquery-3.3.1.min.js"></script>
    <script src="/site/js/bootstrap.min.js"></script>
    <script src="/site/js/jquery.nice-select.min.js"></script>
    <script src="/site/js/jquery-ui.min.js"></script>
    <script src="/site/js/jquery.slicknav.js"></script>
    <script src="/site/js/mixitup.min.js"></script>
    <script src="/site/js/owl.carousel.min.js"></script>
    <script src="/site/js/main.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>

    @stack('script')

    </body>

    </html>
