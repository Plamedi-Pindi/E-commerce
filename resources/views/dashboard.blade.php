@extends('layouts.marge.dashMarge')

@section('title', 'AdminDashboard')

@section('content')

		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
           
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-9 wid-100">
						<div class="row">
							<div class="col-xl-3 col-sm-6">
								<div class="card chart-grd same-card">
									<div class="card-body depostit-card p-0">
										<div class="depostit-card-media d-flex justify-content-between pb-0">
											<div>
												<h6>Faturação</h6>
												<h3>1200.00kz</h3>
											</div>
											<div class="icon-box bg-primary-light">
                                                <h3 style="margin-top: 5px">Kz</h3>
											</div>
										</div>
										<div id="NewCustomers"></div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-sm-6">
								<div class="card same-card">
									<div class="card-body d-flex align-items-center  py-2">
										<div id="AllProject"></div>
										<ul class="project-list">
											<li><h6>Pedidos</h6></li>
											<li>
												<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="10" height="10" rx="3" fill="#3AC977"/>
												</svg>
												Pagos
											</li>
											<li>
												<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="10" height="10" rx="3" fill="var(--primary)"/>
												</svg>
												Pendenetes
											</li>
											<li>
												<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
													<rect width="10" height="10" rx="3" fill="var(--secondary)"/>
												</svg>
												Cancelados
											</li>
										</ul>
									</div>
								</div>
							</div>
						
							<div class="col-xl-3 col-sm-6 same-card">
								<div class="card">
									<div class="card-body depostit-card">
										<div class="depostit-card-media d-flex justify-content-between style-1">
											<div>
												<h6>Usuários</h6>
												<h3>20</h3>
											</div>
											<div class="icon-box bg-primary-light">	

											</div>
										</div>
										<div class="progress-box mt-0">
											<div class="d-flex justify-content-between">
												<p class="mb-0">Tasks Not Finished</p>
												<p class="mb-0">20/28</p>
											</div>
											<div class="progress">
												<div class="progress-bar bg-primary" style="width:50%; height:5px; border-radius:4px;" role="progressbar"></div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>


				</div>

			</div>
        </div>

        <!--**********************************
            Content body end
        ***********************************-->
	
	
	
@endsection
