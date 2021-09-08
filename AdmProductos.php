<!DOCTYPE html>
<html>
<?php
require('conexion.php');
?>

<head>
	<title>GameOverRegistro</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body style="background-image: url(img/bgimg.jpg); background-repeat: no-repeat; background-attachment: fixed">
	<nav class="navbar navbar-expand-lg navbar-dark" style="padding-top: 0px; padding-bottom: 0px; background-color: black">
		<div class="container-fluid">
			<a class="navbar-brand" href="#"><img src="img/logo.png" width="140" height="40"></a>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="AdmUsuarios.php">
							<p class="fs-5" style="margin: 5px">Ad. Usuarios</p>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" href="AdmProductos.php">
							<p class="fs-5" style="margin: 5px">Ad. productos</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<br>
	<div>
		<center>
			<!--Logo-->
			<div style="width: 40%">
				<center><img src="img/logo.png" width="100%" height="170px"></center>
			</div>
			<div class="w3-card-4 w3-round-large" style="width: 50%; text-align: left; background-color: white; box-shadow: 10px 50px 200px #949586">
				<form class="w3-container" id="formulario" method="POST" enctype="multipart/form-data">
					<p>
						<label class="w3-text-black">
							<h3>Tipo de producto</h3>
						</label>
						<select class="form-select" aria-label="Default select example" name="producto">
							<option value="notselect">Seleccionar...</option>
							<option value="juegos">Juego</option>
							<option value="consolas">Consola</option>
							<option value="accesorios">Accesorios</option>
						</select>
					</p>
					<p>
						<label class="w3-text-black">
							<h3>Id</h3>
						</label>
						<input class="w3-input w3-border w3-white" id="id" name="id" type="text" placeholder="">
					</p>
					<p>
						<label class="w3-text-black">
							<h3>Nombre</h3>
						</label>
						<input class="w3-input w3-border w3-white" id="nombre" name="nombre" type="text">
					</p>
					<p>
						<label class="w3-text-black">
							<h3>Imagen</h3>
						</label>
						<input type="file" name="imagen" id="imagen" style="margin-top: 8px; width: 80%;">
					</p>
					<p>
						<label class="w3-text-black">
							<h3>Video</h3>
						</label>
						<input class="w3-input w3-border w3-white" id="video" name="video" type="text" placeholder="Ingrese codigo de Youtube">
					</p>

					<p>
						<label class="w3-text-black">
							<h3>Descripcion</h3>
						</label>
						<input class="w3-input w3-border w3-white" id="descripcion" name="descripcion" type="text">
					</p>
					<p>
						<label class="w3-text-black">
							<h3>Precio</h3>
						</label>
						<input class="w3-input w3-border w3-white" id="Precio" name="precio" type="text">
					</p>
					<p>
					<div>
						<label class="w3-text-black">
							<h3>Oferta</h3>
							<input class="form-check-input" type="checkbox" value="si" id="oferta" name="oferta">
						</label>

					</div>
					</p>
					<br>
					<button class="w3-btn w3-black" name="btnAgregar">Agregar</button>
					<button class="w3-btn w3-black" name="btnActualizar">Actualizar</button>
					<button class="w3-btn w3-black" name="btnEliminar">Eliminar</button>
					<button class="w3-btn w3-black" name="btnBuscar">Buscar</button>
					<br>
				<?php
				if (isset($_POST['btnAgregar'])) {
					$producto = $_POST['producto'];
					$nombre = $_POST['nombre'];
					$descripcion = $_POST['descripcion'];
					$precio = $_POST['precio'];
					if (isset($_POST['oferta']) && $_POST['oferta'] == "si") {
						$oferta = "si";
					} else {
						$oferta = "no";
					}
					$videoyt = $_POST['video'];
					$Video = '<iframe width="660" height="415" src="' . $videoyt . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
					$imagen = $_FILES['imagen']['name'];
					$temporal = $_FILES['imagen']['tmp_name'];
					$carpeta = 'img';
					$ruta = $carpeta . '/' . $imagen;
					move_uploaded_file($temporal, $carpeta . '/' . $imagen);
					$consulta = "INSERT into " . $producto . " (nombre,precio,descripcion,imagen,video,oferta) value('" . $nombre . "','" . $precio . "','" . $descripcion . "','" . $ruta . "','" . $Video . "','" . $oferta . "')";
					$ejecutar = mysqli_query($conexion, $consulta);
					if ($ejecutar == true) {
						echo '<div class="alert alert-success" role="alert" style="margin: 10px">
									' . $producto . ' ' . $nombre . ' agregado correctamente!
						  		</div><br>';
					} else {
						echo '<div class="alert alert-danger" role="alert" style="margin: 10px">
  								Hubo un error al agregar el producto!
							</div><br>';
					}
				}
				if(isset($_POST['btnActualizar'])){
					$id = $_POST['id'];
					$producto = $_POST['producto'];
					$nombre = $_POST['nombre'];
					$imagen = $_FILES['imagen']['name'];
					$temporal = $_FILES['imagen']['tmp_name'];
					$carpeta = 'img';
					$ruta = $carpeta . '/' . $imagen;
					move_uploaded_file($temporal, $carpeta . '/' . $imagen);
					$video = $_POST['video'];
					$descripcion =  $_POST['descripcion'];
					$precio = $_POST['precio'];
					if (isset($_POST['oferta']) && $_POST['oferta'] == "si") {
						$oferta = "si";
					} else {
						$oferta = "no";
					}
					$consulta = "UPDATE ".$producto." set nombre='".$nombre."', descripcion='".$descripcion."', imagen='".$ruta."', video='".$video."' , precio='".$precio."' , oferta='".$oferta."' WHERE id".$producto." =".$id;
					echo "<script> alert('".$consulta."');</script>";
					$ejecutar = mysqli_query($conexion, $consulta);
				}
				if(isset($_POST['btnEliminar'])){
					$id = $_POST['id'];
					$producto = $_POST['producto'];
					$consulta = "DELETE from ".$producto." where id".$producto." = ".$id." ";
					$ejecutar = mysqli_query($conexion, $consulta);
				}
				if(isset($_POST['btnBuscar'])){
					$id = $_POST['id'];
					$producto = $_POST['producto'];
					$consulta = "SELECT * from ".$producto." where id".$producto." = ".$id;
					echo "<script> alert('".$consulta."');</script>";
					$ejecutar = mysqli_query($conexion, $consulta);
					while($result = mysqli_fetch_array($ejecutar)){
						echo "
						<table border='2' style='margin-bottom:15px; width: 50%'>
							<tr>
								<td>Id</td>
								<td>Nombre</td>
								<td>Precio</td>
								<td>oferta</td>
							</tr>
							<tr>
								<td>".$result['id'.$producto.'']."</td>
								<td>".$result['nombre']."</td>
								<td>".$result['precio']."</td>
								<td>".$result['oferta']."</td>";
							"<tr>
						</table>";
					}
				}
				?>
				</form>
			</div>
		</center>
	</div>
	<br>
</body>

</html>