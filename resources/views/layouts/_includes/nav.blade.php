  <!-- Hero Section Begin -->
  <section class="hero hero-normal">
      <div class="container">
          <div class="row">
              <div class="col-lg-3">
                  <div class="hero__categories">
                      <div class="hero__categories__all">
                          <i class="fa fa-bars"></i>
                          <span>Todas categorias</span>
                      </div>
                      <ul>
                          @foreach ($categoriasMenu as $categoria)
                              <li><a href="{{ route('Produto.categorias', $categoria->id) }}">{{ $categoria->nome }}</a></li>
                          @endforeach
                      </ul>
                  </div>
              </div>
              <div class="col-lg-9">
                  <div class="hero__search">
                      <div class="hero__search__form">
                          <form action="#">
                              <div class="hero__search__categories">
                                  Todas categorias
                                  <span class="arrow_carrot-down"></span>
                              </div>
                              <input type="text" placeholder="What do yo u need?">
                              <button type="submit" class="site-btn">SEARCH</button>
                          </form>
                      </div>
                      <div class="hero__search__phone">
                          <div class="hero__search__phone__icon">
                              <i class="fa fa-phone"></i>
                          </div>
                          <div class="hero__search__phone__text">
                              <h5>+65 11.188.888</h5>
                              <span>support 24/7 time</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Hero Section End -->
