<!DOCTYPE html>
<html>
<?php
require('conexion.php');
session_start();
$snreg = $_SESSION['snreg'];
?>

<head>
	<title>GameOverLogin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">

</head>

<body style="background-image: url(img/bgimg.jpg); background-repeat: no-repeat; background-attachment: fixed">
	<nav class="navbar navbar-expand-lg navbar-dark" style="padding-top: 0px; padding-bottom: 0px; background-color: black">
		<div class="container-fluid">
			<a class="navbar-brand" href="index.php"><img src="img/logo.png" width="140" height="40"></a>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" aria-current="page" href="index.php">
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
	<div>
		<!-- Inicio de Sesion-->
		<center>
			<div style="width: 40%">
				<center><img src="img/logo.png" width="100%" height="170px"></center>
			</div>
			<div class="w3-card-4 w3-round-large" style="width: 50%; text-align: left; background-color: white; box-shadow: 10px 10px 100px #949586">

				<form class="w3-container" method="POST">
					<p>
						<label class="w3-text-black">
							<h3>Usuario</h3>
						</label>
						<input class="w3-input w3-border w3-white" id="usu" name="usu" type="text">
					<div name="errorusuario"></div>
					</p>
					<p>
						<label class="w3-text-black">
							<h3>Contraseña</h3>
						</label>
						<input class="w3-input w3-border w3-white" name="pass" type="Password">
					<div name="errorpass1" style=" color: red"></div>
					</p>
					<button class="w3-btn w3-black" name="btn1">Enviar</button>
					<br><br>
					<button class="w3-btn w3-black" name='btn2'>Crear cuenta</button>
				</form>

				<?php
				if (isset($_POST['btn1'])) {
					require('conexion.php');
					$usuario = $_POST['usu'];
					$pass = $_POST['pass'];
					$consulta = "Select usuario from registro where usuario = '$usuario'";
					$ejecutar = mysqli_query($conexion, $consulta);
					$result = mysqli_num_rows($ejecutar);

					if ($usuario === null || $usuario === "") {
						echo "<script> errorusuario.innerHTML = 'Campo vacio';</script>";
					}
					if ($pass === null || $pass === '') {
						echo "<script> errorpass1.innerHTML = 'Campo vacio';</script>";
					}

					if ($result > 0) {
						$conpass = "Select * from registro where usuario = '$usuario'";
						$ejecutarcon = mysqli_query($conexion, $conpass);
						$result = mysqli_fetch_array($ejecutarcon);
						if ($pass == $result['password']) {
							$nivel = $result['nivel'];
							if ($nivel == 0) {
								session_start();
								$_SESSION['snreg'] = 1;
								$_SESSION['usu'] = $usuario;
								header("Location: index.php");
							} else {
								if ($nivel == 1) {
									header("Location: AdmUsuarios.php");
								}
							}
						}
					} else {
						echo "<script> alert('Usuario o contraseña incorrecto'); </script>";
					}
				}
				if (isset($_POST['btn2'])) {
					header("Location: Registro.php");
				}
				?>

				<br>
			</div>
		</center>
	</div>
</body>

</html>