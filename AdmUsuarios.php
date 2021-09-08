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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="background-image: url(img/bgimg.jpg); background-repeat: no-repeat; background-attachment: fixed">
    <nav class="navbar navbar-expand-lg navbar-dark" style="padding-top: 0px; padding-bottom: 0px; background-color: black">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="img/logo.png" width="140" height="40"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="AdmUsuarios.php">
                            <p class="fs-5" style="margin: 5px">Ad. Usuarios</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AdmProductos.php">
                            <p class="fs-5" style="margin: 5px">Ad. productos</p>
                        </a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" aria-current="page" href="Compras.php">
                            <p class="fs-5" style="margin: 5px">Compras</p>
                        </a>
                    </li>-->
                </ul>
            </div>
        </div>
    </nav>
    <div>
        <!-- Buscar-->
        <center>
            <!--Logo-->
            <div style="width: 40%">
                <center><img src="img/logo.png" width="100%" height="170px"></center>
            </div>
            <div class="w3-card-4 w3-round-large" style="width: 50%; text-align: left; background-color: white;">
                <form class="w3-container" id="formulario" method="POST">
                    <br>
                    <div>
                        <label class="w3-text-black">
                            <h3>Id</h3>
                        </label>
                        <input class="w3-input w3-border w3-white" name="id" id="id" type="text">
                        <div id="errorusuario"></div>
                    </div>
                    <br>
                    <div>
                        <label class="w3-text-black">
                            <h3>Nombre</h3>
                        </label>
                        <input class="w3-input w3-border w3-white" name="usuario" id="usuario" type="text">
                        <div id="errorpass1"></div>
                    </div>
                    <br>
                    <div>
                        <label class="w3-text-black">
                            <h3>Contraseña</h3>
                        </label>
                        <input class="w3-input w3-border w3-white" name="contraseña" id="contraseña" type="text">
                        <div id="errorpass1"></div>
                    </div>
                    <br>
                    <div>
                        <label class="w3-text-black">
                            <h3>Tipo de Usuario</h3>
                        </label><br>
                        <select name="TU">
                            <option value="">Seleccionar...</option>
                            <option value="0">Cliente</option>
                            <option value="1">Administrador</option>
                        </select>
                    </div>
                    <div name="mostrar" id="mostrar"></div>
                    <br>
                    <button class="w3-btn w3-black" name="btnAgregar">Agregar</button>
                    <button class="w3-btn w3-black" name="btnActualizar">Actualizar</button>
                    <button class="w3-btn w3-black" name="btnEliminar">Eliminar</button>
                    <button class="w3-btn w3-black" name="btnBuscar">Buscar</button>
                    <button class="w3-btn w3-black" name="btnMostrarTodo">Mostrar Todo</button>
                <?php
                    if(isset($_POST['btnAgregar'])){
                        $id = $_POST['id'];
                        $usuario = $_POST['usuario'];
                        $contraseña = $_POST['contraseña'];
                        $TU = $_POST['TU'];
                        $consulta = "INSERT into registro(usuario, password, nivel) values('".$usuario."','".$contraseña."',".$TU.")";
                        $ejecutar = mysqli_query($conexion, $consulta);
                    }
                    if(isset($_POST['btnActualizar'])){
                        $id = $_POST['id'];
                        $usuario = $_POST['usuario'];
                        $password = $_POST['contraseña'];
                        $TU = $_POST['TU'];
                        $consulta = "UPDATE registro set usuario='".$usuario."', password='".$password."', nivel=".$TU." WHERE idregistro =".$id;
                        $ejecutar = mysqli_query($conexion, $consulta);
                    }
                    if(isset($_POST['btnEliminar'])){
                        $id = $_POST['id'];
                        $consulta = "DELETE from registro where idregistro =".$id;
                        $ejecutar = mysqli_query($conexion, $consulta);
                    }
                    if(isset($_POST['btnBuscar'])){
                        $id = $_POST['id'];
                        $consulta = "SELECT * from registro where idregistro = ".$id;
                        $ejecutar = mysqli_query($conexion, $consulta);
                        while($result = mysqli_fetch_array($ejecutar)){
                            echo "
                            <table border='2' style='margin-bottom:15px; width: 50%'>
                                <tr>
                                    <td>Id</td>
                                    <td>Usuario</td>
                                    <td>Password</td>
                                    <td>Nivel</td>
                                </tr>
                                <tr>
                                    <td>".$result['idregistro']."</td>
                                    <td>".$result['usuario']."</td>
                                    <td>".$result['password']."</td>";
                                    if($result['nivel']==1){
                                        echo"<td>Administrador</td>";
                                    }else{
                                        if($result['nivel']==0){
                                            echo "<td>Cliente</td>";
                                        }
                                    }
                                "<tr>
                            </table>";
                        }
                    }
                    if(isset($_POST['btnMostrarTodo'])){
                        $consulta = "SELECT * from registro";
                        $ejecutar = mysqli_query($conexion, $consulta);
                        echo "
                        <br><br>
                        <table border='2' style='margin-bottom:15px; width: 50%'>
                            <tr>
                                <td>Id</td>
                                <td>Usuario</td>
                                <td>Password</td>
                                <td>Nivel</td>
                            </tr>";
                        while($result = mysqli_fetch_array($ejecutar)){
                            echo "<tr>
                            <td>".$result['idregistro']."</td>
                            <td>".$result['usuario']."</td>
                            <td>".$result['password']."</td>";
                            if($result['nivel']==1){
                                echo"<td>Administrador</td>";
                            }else{
                                if($result['nivel']==0){
                                    echo "<td>Cliente</td>";
                                }
                            }
                        "<tr>";
                        }
                        echo "</table>";
                    }
                ?>
                </form>
                <br>
            </div>
        </center>
    </div>
    <br>
</body>

</html>