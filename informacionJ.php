<html>
<?php
require('conexion.php');
$id = $_GET["prod"];
session_start();
$snreg = $_SESSION['snreg'];
?>

<head>
    <title>GameOverRegistro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/slide.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
    <!--container-->
    <center>
        <div style="background-color: white; height: 100%; width: 80%; margin-top: 10px;">
                <a href="index.php"><button type="button" class="btn btn-dark" style="margin-right: 100%; border-radius: 0px;">
                    <h5><</h5>
                </button></a>
            <!--imagen-->
            <div style="height:400px; width:415px; float: left; margin-top: 10px; margin-bottom: 40px;">
                <?php
                $consulta = "SELECT * from juegos where idjuegos =" . $id;
                $ejecutar = mysqli_query($conexion, $consulta);
                while ($result = mysqli_fetch_array($ejecutar)) {
                    echo "<img src=" . $result["imagen"] . " style='width:300px; height: 400px ; margin: 10px'>";
                }
                ?>
            </div>
            <!--video y descripcion-->
            <div style="height: 100%; width:800; float: right;">
                <div style="margin:10px">
                    <!--video-->
                    <div style="margin: 50px; margin-top: 20px;">
                        <?php
                        $consulta = "SELECT * from juegos where idjuegos =" . $id;
                        $ejecutar = mysqli_query($conexion, $consulta);
                        while ($result = mysqli_fetch_array($ejecutar)) {
                            $url = $result["video"];
                            echo $url;
                        }
                        ?>
                    </div>
                    <!--Descripcion-->
                    <div style="text-align: justify; margin: 10px">
                        <?php
                        $consulta = "SELECT * from juegos where idjuegos =" . $id;
                        $ejecutar = mysqli_query($conexion, $consulta);
                        while ($result = mysqli_fetch_array($ejecutar)) {
                            echo $result['descripcion'];
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!--nombre, precio y boton-->
            <div style="height: 321px; width: 415px; float: left;">
                <h1>
                    <?php
                    $consulta = "SELECT * from juegos where idjuegos =" . $id;
                    $ejecutar = mysqli_query($conexion, $consulta);
                    while ($result = mysqli_fetch_array($ejecutar)) {
                        echo $result['nombre'];
                    }
                    ?>
                </h1>
                <h2 style="color: red;">
                    <?php
                    $consulta = "SELECT * from juegos where idjuegos =" . $id;
                    $ejecutar = mysqli_query($conexion, $consulta);
                    while ($result = mysqli_fetch_array($ejecutar)) {
                        echo "Precio: $" . $result['precio'];
                    }
                    ?>
                </h2>
            </div>
        </div>
    </center>
</body>

</html>