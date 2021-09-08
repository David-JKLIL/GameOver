<nav class="navbar navbar-expand-lg navbar-dark" style="padding-top: 0px; padding-bottom: 0px; background-color: black; box-shadow: 0px 5px 5px;">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php"><img src="img/logo.png" width="140" height="40"></a>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="index.php">
							<p class="fs-5" style="margin: 5px">Inicio</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Buscar.php">
							<p class="fs-5" style="margin: 5px">Buscar</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Lista.php">
							<p class="fs-5" style="margin: 5px">Lista</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="Ofertas.php">
							<p class="fs-5" style="margin: 5px">Ofertas</p>
						</a>
					</li>
				</ul>
				<?php
				if ($snreg == 0) {
					echo "
					<ul class='navbar-nav me-0 mb-2 mb-lg-0'>
						<ul class='nav justify-content-end'>
							<li class='nav-item'>
								<a class='nav-link' href='Login.php'>
									<p class='fs-5' style='margin: 5px'>Iniciar Sesion</p>
								</a>
							</li>
						</ul>
						<ul class='nav justify-content-end'>
							<li class='nav-item'>
								<a class='nav-link' href='Registro.php'><p class='fs-5' style='margin: 5px'>Registrarse</p></a>
							</li>
						</ul>
					</ul>";
				} else {
					if ($snreg == 1) {
						$usuario = $_SESSION['usu'];
						echo "
						<ul class='navbar-nav me-auto mb-2 mb-lg-0'>
							<ul class='nav justify-content-end'>
								<li class='nav-item' style='color: white;'><p class='fs-5' style='margin: 5px'>" . $usuario . "</p></li>
							</ul>
							<ul class='nav justify-content-end'>
								<li class='nav-item'>
								<form method='POST'>
									<button class='w3-btn w3-black' name='btnS'><p class='fs-5' style='margin: 5px; color: white'>Salir</p></button>
								</li>
								</form>
							</ul>
						</ul>";
					}
					if (isset($_POST['btnS'])) {
						$usuario = $_SESSION['usu'];
						unset($_SESSION['usu']);
						header("Location: validacion.php");
					}
				}
				?>
			</div>
		</div>
	</nav>