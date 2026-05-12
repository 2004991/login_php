<?php

session_start();

include("conexion.php");

if(!isset($_SESSION['usuario'])){

    header("Location: login.php");

}

$correo = $_SESSION['correo'];

if(isset($_POST['cambiar'])){

    $actual = $_POST['actual'];
    $nueva = $_POST['nueva'];
    $confirmar = $_POST['confirmar'];

    $consulta = mysqli_query($conexion,
    "SELECT * FROM usuarios WHERE correo='$correo'");

    $usuario = mysqli_fetch_assoc($consulta);

    // Verificar contraseña actual
    if(password_verify($actual, $usuario['password'])){

        // Verificar coincidencia
        if($nueva == $confirmar){

            $password_hash = password_hash($nueva, PASSWORD_DEFAULT);

            $actualizar = mysqli_query($conexion,
            "UPDATE usuarios SET password='$password_hash'
            WHERE correo='$correo'");

            if($actualizar){

                echo "Contraseña actualizada correctamente";

            } else {

                echo "Error al actualizar";

            }

        } else {

            echo "Las nuevas contraseñas no coinciden";

        }

    } else {

        echo "La contraseña actual es incorrecta";

    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Cambiar Contraseña</title>
</head>
<body>

<h2>Cambiar Contraseña</h2>

<form method="POST">

    <input type="password"
    name="actual"
    placeholder="Contraseña actual"
    required><br><br>

    <input type="password"
    name="nueva"
    placeholder="Nueva contraseña"
    required><br><br>

    <input type="password"
    name="confirmar"
    placeholder="Confirmar nueva contraseña"
    required><br><br>

    <button type="submit" name="cambiar">
        Cambiar contraseña
    </button>

</form>

<br>

<a href="perfil.php">Volver al perfil</a>

</body>
</html>