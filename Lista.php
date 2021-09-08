<!DOCTYPE html>
<html>
<?php
require('conexion.php');
session_start();
$snreg = $_SESSION['snreg'];
?>

<head>
    <title>GameOverRegistro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">

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
    <center>
        <div class="w3-container w3-black w3-center w3-allerta">
            <p class="w3-xxxlarge" style="font-family: 'Allerta Stencil',Sans-serif;">Lista de productos</p>
        </div>
        <br>
        <div class="w3-container w3-black w3-center w3-allerta" style="width: 50%;">
            <p class="w3-xxlarge" style="font-family: 'Allerta Stencil',Sans-serif;">Lista de Videojuegos</p>
        </div>
        <div style="width: 50%; background-color: white;">
            <ul class="w3-ul w3-hoverable">
                <?php
                require('conexion.php');
                $consulta = "Select * from juegos";
                $ejecutar = mysqli_query($conexion, $consulta);
                while ($result = mysqli_fetch_array($ejecutar)) {
                    echo "<li>" . $result['nombre'] . '-' . $result['precio'] . "</li>";
                }
                ?>
            </ul>
        </div>
        <br>
        <br>
        <div class="w3-container w3-black w3-center w3-allerta" style="width: 50%;">
            <p class="w3-xxlarge" style="font-family: 'Allerta Stencil',Sans-serif;">Lista de Consolas</p>
        </div>
        <div style="width: 50%; background-color: white;">
            <ul class="w3-ul w3-hoverable">
                <?php
                require('conexion.php');
                $consulta = "Select * from consolas";
                $ejecutar = mysqli_query($conexion, $consulta);
                while ($result = mysqli_fetch_array($ejecutar)) {
                    echo "<li>" . $result['nombre'] . '-' . $result['precio'] . "</li>";
                }
                ?>
            </ul>
        </div>
        <br>
        <br>
        <div class="w3-container w3-black w3-center w3-allerta" style="width: 50%;">
            <p class="w3-xxlarge" style="font-family: 'Allerta Stencil',Sans-serif;">Lista de Accesorios</p>
        </div>
        <div style="width: 50%; background-color: white;">
            <ul class="w3-ul w3-hoverable">
                <?php
                require('conexion.php');
                $consulta = "Select * from accesorios";
                $ejecutar = mysqli_query($conexion, $consulta);
                while ($result = mysqli_fetch_array($ejecutar)) {
                    echo "<li>" . $result['nombre'] . '-' . $result['precio'] . "</li>";
                }
                ?>
            </ul>
        </div>
        <br><br>
    </center>
</body>

</html>