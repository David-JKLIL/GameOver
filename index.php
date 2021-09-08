<!DOCTYPE html>
<?php
require('conexion.php');
session_start();
$snreg = $_SESSION['snreg'];
echo "<script src='js/app.js'></script>";
?>
<html>

<head>
	<title>GameOver</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/slide.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<!--<body style="background-image: url(img/bgimg.jpg); background-repeat: no-repeat; background-attachment: fixed">-->

<body style="background-image: url(img/bgimg.jpg); background-repeat: no-repeat; background-attachment: fixed">
	<!--navbar-->
	<?php
	include "Inserciones/navbar.php";
	?>
	<br>
	<?php
	include "Inserciones/TabsImg.php";
	?>
	<!--Contenedor de juegos,consolas y accesorios-->
	<section>
		<br>
		<center>
			<div style="width: 1200px; background-color: white">
				<!--Seccion de navegacion-->
				<div class="w3-bar w3-black">
					<button class="w3-bar-item w3-button" onclick="openCity('Videojuegos')">
						<h4>Videojuegos</h4>
					</button>
					<button class="w3-bar-item w3-button" onclick="openCity('Consolas')">
						<h4>Consolas</h4>
					</button>
					<button class="w3-bar-item w3-button" onclick="openCity('Accesorios')">
						<h4>Accesorios<h4>
					</button>
					<button class="w3-bar-item w3-button" onclick="openCity('Carrito')">
						<h4>Carrito<h4>
					</button>

				</div>
				<!-- Contenedor de videojuegos,consolas,accesorios y carrito-->
				<!--Videojuegos-->
				<div id="Videojuegos" class="w3-container w3-display-container city">
					<!--tablas-->
					<br>
					<table border="0">
						<?php
						$cont = 0;
						$consulta = "SELECT * from juegos where oferta = 'no'";
						$ejecutar = mysqli_query($conexion, $consulta);
						echo "<tr>";
						while ($result = mysqli_fetch_array($ejecutar)) {
							echo '<td>
										<div class="w3-container carta">
											<div class="w3-card-4" style="width: 250px; height: 380px; margin-bottom: 20px">
												<center>
												<br>
												<a href="informacionJ.php?prod=' . $result['idjuegos'] . '"><img class="imagen" src="' . $result['imagen'] . '" style="width: 170px; height: 200px"></a>
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
				<!--Consolas-->
				<div id="Consolas" class="w3-container w3-display-container city" style="display:none">
					<br>
					<table border="0">
						<?php
						$cont = 0;
						$consulta = "SELECT * from consolas";
						$ejecutar = mysqli_query($conexion, $consulta);
						echo "<tr>";
						while ($result = mysqli_fetch_array($ejecutar)) {
							echo '<td>
										<div class="w3-container carta">
											<div class="w3-card-4" style="width: 250px; height: 380px; margin-bottom: 20px">
												<center>
												<br>
												<a href="informacionC.php?prod=' . $result['idconsolas'] . '"><img class="imagen" src="' . $result['imagen'] . '" style="width: 170px"></a>
												</center>
												<div class="w3-container w3-center">
												<br>
												<p class="title" style="margin-bottom:0px"><a href="informacionC.php?prod=' . $result['idconsolas'] . '">' . $result['nombre'] . '<a></p>
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
				<!--Accesorios-->
				<div id="Accesorios" class="w3-container w3-display-container city" style="display:none">
					<br>
					<table border="0">
						<?php
						$cont = 0;
						$consulta = "SELECT * from accesorios";
						$ejecutar = mysqli_query($conexion, $consulta);
						echo "<tr>";
						while ($result = mysqli_fetch_array($ejecutar)) {
							echo '<td>
										<div class="w3-container carta">
											<div class="w3-card-4" style="width: 250px; height: 380px; margin-bottom: 20px">
												<center>
												<br>
												<a href="informacionA.php?prod=' . $result['idaccesorios'] . '"><img class="imagen" src="' . $result['imagen'] . '" style="width: 170px"></a>
												</center>
												<div class="w3-container w3-center">
												<br>
												<p class="title" style="margin-bottom:0px"><a href="informacionA.php?prod=' . $result['idaccesorios'] . '">' . $result['nombre'] . '<a></p>
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
				<!--carrito-->
				<div id="Carrito" class="w3-container w3-display-container city" style="display:none">
					<span onclick="this.parentElement.style.display='none'" class="w3-button w3-large w3-display-topright">&times;</span>
					<br>
					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Nombre</th>
								<th scope="col">Precio</th>
								<th scope="col">Cantidad</th>
							</tr>
						</thead>
						<tbody class="tbody">
						</tbody>
					</table>
					<div class="row mx-4">
						<div class="col">
							<h3 class="itemCartTotal text-black"><span class="itemCarTotal"></span></h3>
						</div>
						<div class="col d-flex justify-content-end">
							<button class="btn-success" onclick="comprar()">COMPRAR</button>
						</div>
					</div>
					<br>
				</div>
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
	<!--footer-->
	<footer style="background-color: black; height: 200px;">
		<div style="background-color: yellow; float: left; margin: 70px;">
			asdasd
		</div>
		<div style="background-color: green; float: left; margin: 70px;">
			asdasd
		</div>
		<div style="background-color: red; float: left; margin: 70px;">
			asdasd
		</div>
	</footer>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="js/app.js"></script>

</html>