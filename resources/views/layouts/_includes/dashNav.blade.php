
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
					<li class="menu-title">YOUR COMPANY</li>
					<li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
						<div class="menu-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                              </svg>
						</div>
						<span class="nav-text">Dashboard</span>
						</a>
						<ul aria-expanded="false">
							<li ><a href="{{ route('home') }}" class="list-text">Home</a></li>
							<li><a href="{{ route('Admindashboard') }}" class="list-text">Dashboard</a></li>
						</ul>
					</li>
					<li><a class="has-arrow" href="javascript:void(0);" class="" aria-expanded="false">
						<div class="menu-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pin-angle-fill" viewBox="0 0 16 16">
  <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146z"/>
</svg>
						</div>
							<span class="nav-text">Produtos</span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="{{ route('adminProduto') }}" class="list-text">Todos os produtos</a></li>
							<li><a href="{{ route('adminCategoria') }} " class="list-text">Categorias</a></li>
						</ul>
					</li>

				</ul>
			</div>
        </div>

        <!--**********************************
            Sidebar end
        ***********************************-->
