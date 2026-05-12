<?php

include("conexion.php");

if(isset($_POST['registrar'])){

    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Verificar correo repetido
    $verificar = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo'");

    if(mysqli_num_rows($verificar) > 0){

        echo "El correo ya está registrado";

    } else {

        // Encriptar contraseña
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $insertar = mysqli_query($conexion,
        "INSERT INTO usuarios(cedula,nombre,correo,password)
        VALUES('$cedula','$nombre','$correo','$password_hash')");

        if($insertar){
            echo "Usuario registrado correctamente";
        } else {
            echo "Error al registrar";
        }

    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>

<h2>Registro de Usuario</h2>

<form method="POST">

    <input type="text" name="cedula" placeholder="Cédula" required><br><br>

    <input type="text" name="nombre" placeholder="Nombre" required><br><br>

    <input type="email" name="correo" placeholder="Correo" required><br><br>

    <input type="password" name="password" placeholder="Contraseña" required><br><br>

    <button type="submit" name="registrar">Registrarse</button>

</form>

</body>
</html>