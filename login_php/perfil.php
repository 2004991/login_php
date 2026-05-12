<?php

session_start();

include("conexion.php");

if(!isset($_SESSION['usuario'])){

    header("Location: login.php");

}

$correoSesion = $_SESSION['correo'];

$consulta = mysqli_query($conexion,
"SELECT * FROM usuarios WHERE correo='$correoSesion'");

$datos = mysqli_fetch_assoc($consulta);

if(isset($_POST['actualizar'])){

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    $actualizar = mysqli_query($conexion,
    "UPDATE usuarios SET nombre='$nombre',
    correo='$correo'
    WHERE correo='$correoSesion'");

    if($actualizar){

        $_SESSION['usuario'] = $nombre;
        $_SESSION['correo'] = $correo;

        echo "Datos actualizados correctamente";

        header("Refresh:1");

    } else {

        echo "Error al actualizar";

    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Perfil</title>
</head>
<body>

<h2>Bienvenido</h2>

<p>
<?php
echo $_SESSION['usuario'];
?>
</p>

<h3>Actualizar Datos</h3>

<form method="POST">

    <input type="text"
    name="nombre"
    value="<?php echo $datos['nombre']; ?>"
    required><br><br>

    <input type="email"
    name="correo"
    value="<?php echo $datos['correo']; ?>"
    required><br><br>

    <button type="submit" name="actualizar">
        Actualizar
    </button>

</form>

<br>

<a href="cambiar_password.php">
Cambiar contraseña
</a>

<br><br>

<a href="logout.php">
Cerrar sesión
</a>

</body>
</html>