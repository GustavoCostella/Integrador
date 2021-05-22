<?php  
session_start();

?>

<body class="sb-nav-fixed">
	<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
		<a class="navbar-brand" href="dash.php">Revizzi Auto</a>
		<button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
	</nav>
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
				<div class="sb-sidenav-menu">
					<div class="nav">
						<div class="sb-sidenav-menu-heading">Principais</div>
						<a class="nav-link" href="dash.php">
							<div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
							Dashboard
						</a>
						<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
							<div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
							Paginas
							<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
							<nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
								<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
									Cadastrar
									<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
								</a>
								<div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
									<nav class="sb-sidenav-menu-nested nav">
										<a class="nav-link" href="agendamento.php">Agendamento</a>
										<a class="nav-link" href="servico.php">Serviço</a>
										<a class="nav-link" href="orcamento.php">Orçamento</a>
									</nav>
								</div>
							</nav>
						</div>
						<div class="sb-sidenav-menu-heading">Adicionais</div>
						<a class="nav-link" href="#">
							<div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
							Graficos
						</a>
						<a class="nav-link" href="#">
							<div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
							Tabelas
						</a>
					</div>
				</div>
				<div class="sb-sidenav-footer">
					<div class="small">Logado como:</div>
					<?php
					echo $_SESSION['usuario'];

					?>
					<div class="small">
						<a href="logout.php">sair</a>
					</div>
				</div>
			</nav>
		</div>
<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid">
					<h1 class="mt-4">Dashboard</h1>
					<ol class="breadcrumb mb-4">
						<li class="breadcrumb-item active">Dashboard</li>
					</ol>
					<div class="row">
						<div class="col-xl-3 col-md-6">
							<div class="card bg-primary text-white mb-4">
								<div class="card-body">Serviços Aguardando</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<h5>0</h5>	
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card bg-warning text-white mb-4">
								<div class="card-body">Serviços Abertos</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<h5>0</h5>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-md-6">
							<div class="card bg-success text-white mb-4">
								<div class="card-body">Serviços Fechados</div>
								<div class="card-footer d-flex align-items-center justify-content-between">
									<h5>0</h5>
								</div>
							</div>
						</div>
					</div>