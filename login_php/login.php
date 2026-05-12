<?php

session_start();

include("conexion.php");

if(isset($_POST['ingresar'])){

    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $consulta = mysqli_query($conexion,
    "SELECT * FROM usuarios WHERE correo='$correo'");

    if(mysqli_num_rows($consulta) > 0){

        $usuario = mysqli_fetch_assoc($consulta);

        if(password_verify($password, $usuario['password'])){

            $_SESSION['usuario'] = $usuario['nombre'];
            $_SESSION['correo'] = $usuario['correo'];

            header("Location: perfil.php");

        } else {

            echo "Contraseña incorrecta";

        }

    } else {

        echo "Correo no encontrado";

    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Iniciar Sesión</h2>

<form method="POST">

    <input type="email" name="correo" placeholder="Correo" required><br><br>

    <input type="password" name="password" placeholder="Contraseña" required><br><br>

    <button type="submit" name="ingresar">Ingresar</button>

</form>

</body>
</html>