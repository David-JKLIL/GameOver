<!DOCTYPE html>
<html>
<?php
require('conexion.php');
session_start();
$snreg = $_SESSION['snreg'];
?>

<head>
	<title>GameOver</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/slide.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
</head>

<body style="background-image: url(img/bgimg.jpg); background-repeat: no-repeat; background-attachment: fixed">
	<nav class="navbar navbar-expand-lg navbar-dark" style="padding-top: 0px; padding-bottom: 0px; background-color: black">
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

					<?php
					if ($snreg == 0) {
						echo "
							<li class='nav-item'>
								<a class='nav-link' href='Login.php'><p class='fs-5' style='margin: 5px'>Iniciar Sesion</p></a>
							</li>
							<li class='nav-item'>
								<a class='nav-link' href='Registro.php'><p class='fs-5' style='margin: 5px'>Registrarse</p></a>
							</li>
							</ul>";
					} else {
						if ($snreg == 1) {
							$usuario = $_SESSION['usu'];
							echo "</ul>
							<ul class='nav justify-content-end'>
								<li class='nav-item' style='color: white;'><p class='fs-5' style='margin: 5px'>" . $usuario . "</p></li>
							</ul>
							<ul class='nav justify-content-end'>
								<li class='nav-item'>
								<form method='POST'>
									<button class='w3-btn w3-black' name='btnS'><p class='fs-5' style='margin: 5px; color: white'>Salir</p></button>
								</li>
								</form>
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
	<br>
	<div class="w3-container w3-black w3-center w3-allerta">
		<p class="w3-xxxlarge" style="font-family: 'Allerta Stencil',Sans-serif;">OFERTAS!</p>
	</div>
	<section>
		<!--Contenedor de juegos,consolas y accesorios-->
		<br>
		<center>
			<div style="width: 1200px; background-color: white">
				<div class="w3-bar w3-black">
					<button class="w3-bar-item w3-button" onclick="openCity('Videojuegos')">
						<h4>Videojuegos</h4>
					</button>
					<!--<button class="w3-bar-item w3-button" onclick="openCity('Consolas')">
						<h4>Consolas</h4>
					</button>
					<button class="w3-bar-item w3-button" onclick="openCity('Accesorios')">
						<h4>Accesorios<h4>
					</button>-->
				</div>

				<div id="Videojuegos" class="w3-container w3-display-container city">
					<!--tablas-->
					<br>
					<table border="0">
					<?php
						$cont = 0;
						$consulta = "SELECT * from juegos where oferta = 'si'";
						$ejecutar = mysqli_query($conexion, $consulta);
						echo "<tr>";
						while ($result = mysqli_fetch_array($ejecutar)) {
							echo '<td>
										<div class="w3-container carta">
											<div class="w3-card-4" style="width: 250px; height: 380px; margin-bottom: 20px">
												<center>
												<br>
												<a href="informacionJ.php?prod=' . $result['idjuegos'] . '"><img class="imagen" src="' . $result['imagen'] . '" style="width: 170px; height: 230px"></a>
												</center>
												<div class="w3-container w3-center">
												<br>
												<p class="title" style="margin-bottom:0px"><a href="informacionJ.php?prod=' . $result['idjuegos'] . '">' . $result['nombre'] . '<a></p>
												<h5 style="color:red; text-align: center">Precio: <span class="precio">$' . $result['precio'] . '</span></h5>
												<button class="w3-button w3-black button">Comprar</button>
												<br>
												<br>
												</div>
											</div>
										</div>
									</td>';
							$cont++;
							if ($cont == 4) {
								echo "</tr>";
								$cont = 0;
							}
						}
						?>
					</table>
					<br>
				</div>

				<!--<div id="Consolas" class="w3-container w3-display-container city" style="display:none">
					<span onclick="this.parentElement.style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
					<br>
					<table border="0">
					</table>
					<br>

				</div>-->

				<!--<div id="Accesorios" class="w3-container w3-display-container city" style="display:none">
					<span onclick="this.parentElement.style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
					<br>
					<table border="0">
						<tr>
							<td>
								<div class="w3-container">
									<div class="w3-card-4" style="width: 300px; height: 500px; margin: 10px">
										<center>
											<br>
											<img src="img/mandops4.jpg" style="width: 250px">
										</center>
										<div class="w3-container w3-center">
											<br>
											<p>Mando PS4</p>
											<h4 style="color:red; text-align: center">Precio: $45000</h4>
											<button class="w3-button w3-black">Comprar</button>
											<br>
											<br>
										</div>
									</div>
								</div>
							</td>
							<td>
								<div class="w3-container">
									<div class="w3-card-4" style="width:300px; height: 500px; margin: 10px">
										<center>
											<br>
											<img src="img/mandops5.jpg" style="width: 250px">
										</center>
										<div class="w3-container w3-center">
											<br>
											<p>Mando PS5</p>
											<h4 style="color:red; text-align: center;">Precio: $50000</h4>
											<button class="w3-button w3-black">Comprar
											</button>
											<br><br>
										</div>
									</div>
								</div>
							</td>
							<td>
								<div class="w3-container">
									<div class="w3-card-4" style="width: 300px; height: 500px; margin: 10px">
										<center>
											<br>
											<img src="img/mandoxboxone.jpg" style="width: 250px">
										</center>
										<div class="w3-container w3-center">
											<br>
											<p>Mando XBOX ONE</p>
											<h4 style="color:red; text-align: center">Precio: $40000</h4>
											<button class="w3-button w3-black">Comprar</button>
											<br>
											<br>
										</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							Segunda fila de juego
							<td>
								<div class="w3-container">
									<div class="w3-card-4" style="width: 300px; height: 500px; margin: 10px">
										<center>
											<br>
											<img src="img/mandosw.jpg" style="width: 250px">
										</center>
										<div class="w3-container w3-center">
											<br>
											<p>Mando Nintendo Switch</p>
											<h4 style="color:red; text-align: center">Precio: $20000</h4>
											<button class="w3-button w3-black">Comprar</button>
											<br>
											<br>
										</div>
									</div>
								</div>
							</td>
							<td>
								<div class="w3-container">
									<div class="w3-card-4" style="width:300px; height: 500px; margin: 10px">
										<center>
											<br>
											<img src="img/audi.jpg" style="width: 250px">
										</center>
										<div class="w3-container w3-center">
											<br>
											<p>Audifonos gamer RX</p>
											<h4 style="color:red; text-align: center;">Precio: $15000</h4>
											<button class="w3-button w3-black">Comprar
											</button>
											<br><br>
										</div>
									</div>
								</div>
							</td>
							<td>
								<div class="w3-container">
									<div class="w3-card-4" style="width: 300px; height: 500px; margin: 10px">
										<center>
											<br>
											<img src="img/audi2.jpg" style="width: 250px">
										</center>
										<div class="w3-container w3-center">
											<br>
											<p>Audifonos Gamer Onikuma</p>
											<h4 style="color:red; text-align: center">Precio: $40000</h4>
											<button class="w3-button w3-black">Comprar</button>
											<br>
											<br>
										</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="w3-container">
									<div class="w3-card-4" style="width: 300px; height: 500px; margin: 10px">
										<center>
											<br>
											<img src="img/micro.jpg" style="width: 250px">
										</center>
										<div class="w3-container w3-center">
											<br>
											<p>Microfono Hyper</p>
											<h4 style="color:red; text-align: center">Precio: $40000</h4>
											<button class="w3-button w3-black">Comprar</button>
											<br>
											<br>
										</div>
									</div>
								</div>
							</td>
						</tr>

					</table>
					<br>
				</div>-->
				<script>
					function openCity(cityName) {
						var i;
						var x = document.getElementsByClassName("city");
						for (i = 0; i < x.length; i++) {
							x[i].style.display = "none";
						}
						document.getElementById(cityName).style.display = "block";
					}
				</script>
			</div>
		</center>
		<br>
	</section>
	<footer style="background-color: white; height: 60px; opacity: 0.8">
		<br>
		<marquee>Jaime Herrera, Bladimir Flores, David Jaña</marquee>
	</footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>