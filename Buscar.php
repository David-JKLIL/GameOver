<!DOCTYPE html>
<html>
<?php
require('conexion.php');
session_start();
$snreg = $_SESSION['snreg'];
?>
<!--head-->

<head>
	<title>GameOverRegistro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta lang="es">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
</head>
<!--body-->

<body style="background-image: url(img/bgimg.jpg); background-repeat: no-repeat; background-attachment: fixed">
	<!--navbar-->
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
	<!-- Buscar-->
	<div>
		<center>
			<div style="width: 40%">
				<center><img src="img/logo.png" width="100%" height="170px"></center>
			</div>
			<div class="w3-card-4 w3-round-large" style="width: 50%; text-align: left; background-color: white; box-shadow: 10px 50px 200px #949586">

				<form class="w3-container" id="formulario" method="POST">
					<p>
						<label class="w3-text-black">
							<h3>Nombre</h3>
						</label>
						<input class="w3-input w3-border w3-white" id="nombre" name="nombre" type="text" placeholder=""><br>
						<button class="w3-btn w3-black" name="btnBN">Buscar por Nombre</button>
					</p>
					<p>
						<label class="w3-text-black">
							<h3>Precio</h3>
						</label>
						<select class="form-select" aria-label="Default select example" name="Precio">
							<option value="0">Seleccionar...</option>
							<option value="1">Mayor a menor</option>
							<option value="2">Menor a mayor</option>
						</select>
					<div id="errorprecio" style="color: red"></div>
					<br>
					<button class="w3-btn w3-black" name="btnBP">Buscar por precio</button>
					</p>
					<p>
						<label class="w3-text-black">
							<h3>Categoria</h3>
						</label>
						<select class="form-select" aria-label="Default select example" name="categoria">
							<option value="0">Seleccionar...</option>
							<option value="1">Juego</option>
							<option value="2">Consola</option>
							<option value="3">Accesorios</option>
						</select>
					<div id="errorcat" style="color: red"></div>
					</p>
					<br>
					<button class="w3-btn w3-black" name="btnBC">Buscar por categoria</button>
					<br>
					<br>
				</form>
				<?php
				if (isset($_POST['btnBN'])) {
					$Nombre = $_POST['nombre'];
					$consulta = "SELECT * from juegos where Nombre like '%" . $Nombre . "%'";
					$consulta2 = "SELECT * from consolas where Nombre like'%" . $Nombre . "%'";
					$consulta3 = "SELECT * from accesorios where Nombre like'%" . $Nombre . "%'";
					$ejecutar = mysqli_query($conexion, $consulta);
					$ejecutar2 = mysqli_query($conexion, $consulta2);
					$ejecutar3 = mysqli_query($conexion, $consulta3);
					$val1 = mysqli_num_rows($ejecutar);
					$val2 = mysqli_num_rows($ejecutar2);
					$val3 = mysqli_num_rows($ejecutar3);
					echo "<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
									<p class='w3-xxlarge' style='font-family: 'Allerta Stencil',Sans-serif;'>Lista de Productos</p>
								</div><br>
								<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
									<p class='w3-xlarge' style=font-family: 'Allerta Stencil',Sans-serif;'>Videojuegos </p>
								</div>
								<div style='width: 100%; background-color: white;'>
									<ul class='w3-ul w3-hoverable'>";
					if ($val1 > 0) {
						while ($result = mysqli_fetch_array($ejecutar)) {
							echo "<li>" . $result['nombre'] . '-' . $result['precio'] . "</li>";
						}
					} else {
						echo "<li>No hay resultados...</li>";
					}
					echo "<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
									<p class='w3-xlarge' style='font-family: 'Allerta Stencil',Sans-serif;'>Consolas </p>
								</div>";
					if ($val2 > 0) {
						while ($result2 = mysqli_fetch_array($ejecutar2)) {
							echo "<li>" . $result2['nombre'] . '-' . $result2['precio'] . "</li>";
						}
					} else {
						echo "<li>No hay resultados...</li>";
					}

					echo "<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
									<p class='w3-xlarge' style='font-family: 'Allerta Stencil',Sans-serif;'>Accesorios</p>
								</div>";
					if ($val3 > 0) {
						while ($result2 = mysqli_fetch_array($ejecutar3)) {
							echo "<li>" . $result2['nombre'] . '-' . $result2['precio'] . "</li>";
						}
					} else {
						echo "<li>No hay resultados...</li>";
					}
				}
				if (isset($_POST['btnBP'])) {
					$Precio = $_POST['Precio'];
					if ($Precio == "1") {
						$consulta = "SELECT *from juegos order by precio Desc";
						$consulta2 = "SELECT *from consolas order by precio Desc";
						$consulta3 = "SELECT * from accesorios order by precio Desc";
						$ejecutar = mysqli_query($conexion, $consulta);
						$ejecutar2 = mysqli_query($conexion, $consulta2);
						$ejecutar3 = mysqli_query($conexion, $consulta3);
						echo "<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
									<p class='w3-xxlarge' style='font-family: 'Allerta Stencil',Sans-serif;'>Lista de Productos</p>
								</div><br>
								<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
									<p class='w3-xlarge' style=font-family: 'Allerta Stencil',Sans-serif;'>Videojuegos </p>
								</div>
								<div style='width: 100%; background-color: white;'>
									<ul class='w3-ul w3-hoverable'>";
						while ($result = mysqli_fetch_array($ejecutar)) {
							echo "<li>" . $result['nombre'] . '-' . $result['precio'] . "</li>";
						}
						echo "<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
									<p class='w3-xlarge' style='font-family: 'Allerta Stencil',Sans-serif;'>Consolas </p>
								</div>";
						while ($result2 = mysqli_fetch_array($ejecutar2)) {
							echo "<li>" . $result2['nombre'] . '-' . $result2['precio'] . "</li>";
						}
						echo "<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
									<p class='w3-xlarge' style='font-family: 'Allerta Stencil',Sans-serif;'>Accesorios</p>
								</div>";
						while ($result2 = mysqli_fetch_array($ejecutar3)) {
							echo "<li>" . $result2['nombre'] . '-' . $result2['precio'] . "</li>";
						}
					} else {
						if ($Precio == "2") {
							$consulta = "SELECT * from juegos order by precio asc";
							$consulta2 = "SELECT * from consolas order by precio asc";
							$consulta3 = "SELECT * from accesorios order by precio asc";
							$ejecutar = mysqli_query($conexion, $consulta);
							$ejecutar2 = mysqli_query($conexion, $consulta2);
							$ejecutar3 = mysqli_query($conexion, $consulta3);
							echo "<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
									<p class='w3-xxlarge' style='font-family: 'Allerta Stencil',Sans-serif;'>Lista de Productos</p>
								</div><br>
								<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
									<p class='w3-xlarge' style=font-family: 'Allerta Stencil',Sans-serif;'>Videojuegos </p>
								</div>
								<div style='width: 100%; background-color: white;'>
									<ul class='w3-ul w3-hoverable'>";
							while ($result = mysqli_fetch_array($ejecutar)) {
								echo "<li>" . $result['nombre'] . '-' . $result['precio'] . "</li>";
							}
							echo "<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
									<p class='w3-xlarge' style='font-family: 'Allerta Stencil',Sans-serif;'>Consolas </p>
								</div>";
							while ($result2 = mysqli_fetch_array($ejecutar2)) {
								echo "<li>" . $result2['nombre'] . '-' . $result2['precio'] . "</li>";
							}
							echo "<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
									<p class='w3-xlarge' style='font-family: 'Allerta Stencil',Sans-serif;'>Accesorios</p>
								</div>";
							while ($result2 = mysqli_fetch_array($ejecutar3)) {
								echo "<li>" . $result2['nombre'] . '-' . $result2['precio'] . "</li>";
							}
						}
						if ($Precio == "0") {
							echo "<script> errorprecios = document.getElementById('errorprecio');
								errorprecios.innerHTML=' Campo vacio';
							</script>";
						}
					}
				}
				if (isset($_POST['btnBC'])) {
					$categoria = $_POST['categoria'];

					if ($categoria == "1") {
						echo "<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
									<p class='w3-xxlarge' style='font-family: 'Allerta Stencil',Sans-serif;'>Lista de Productos</p>
								</div><br>";
						echo "<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
								<p class='w3-xlarge' style=font-family: 'Allerta Stencil',Sans-serif;'>Videojuegos </p>
							</div>
							<div style='width: 100%; background-color: white;'>
						<ul class='w3-ul w3-hoverable'>";
						$consulta = "SELECT * from juegos";
						$ejecutar = mysqli_query($conexion, $consulta);
						while ($result = mysqli_fetch_array($ejecutar)) {
							echo "<li>" . $result['nombre'] . '-' . $result['precio'] . "</li>";
						}
					} else {
						if ($categoria == "2") {
							$consulta = "SELECT * from consolas";
							$ejecutar = mysqli_query($conexion, $consulta);
							echo "<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
									<p class='w3-xxlarge' style='font-family: 'Allerta Stencil',Sans-serif;'>Lista de Productos</p>
								</div><br>";
							echo "<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
									<p class='w3-xlarge' style='font-family: 'Allerta Stencil',Sans-serif;'>Consolas </p>
								</div>
								<div style='width: 100%; background-color: white;'>
									<ul class='w3-ul w3-hoverable'>";
							while ($result = mysqli_fetch_array($ejecutar)) {
								echo "<li>" . $result['nombre'] . '-' . $result['precio'] . "</li>";
							}
						} else {
							if ($categoria == "3") {
								$consulta = "SELECT * from accesorios";
								$ejecutar = mysqli_query($conexion, $consulta);
								echo "<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
									<p class='w3-xxlarge' style='font-family: 'Allerta Stencil',Sans-serif;'>Lista de Productos</p>
								</div><br>";
								echo "<div class='w3-container w3-black w3-center w3-allerta' style='width: 100%;'>
									<p class='w3-xlarge' style='font-family: 'Allerta Stencil',Sans-serif;'>Accesorios </p>
								</div>
								<div style='width: 100%; background-color: white;'>
									<ul class='w3-ul w3-hoverable'>";
								while ($result = mysqli_fetch_array($ejecutar)) {
									echo "<li>" . $result['nombre'] . '-' . $result['precio'] . "</li>";
								}
							} else {
								if ($categoria == "0") {
									echo "<script> errorcat.innerHTML=' Error al seleccionar'</script>";
								}
							}
						}
					}
				}
				echo "</ul></div>"
				?>
			</div>
		</center>
	</div>
	<br>
</body>

</html>