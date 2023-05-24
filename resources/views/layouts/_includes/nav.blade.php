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

                              <input type="text" placeholder="Deseja buscar um produto?">
                              <button type="submit" class="site-btn">BUSCAR</button>
                          </form>
                      </div>
                      <div class="hero__search__phone">
                          <div class="hero__search__phone__icon">
                              <i class="fa fa-phone"></i>
                          </div>
                          <div class="hero__search__phone__text">
                              <h5>+244 926477947</h5>
                              <span>Nosso WhatsApp</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- Hero Section End -->
