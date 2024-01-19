<?php
$host="localhost";
$user="root";
$contrasena="";
$bd="Hojadevida";

$conexion = new mysqli($host, $user, $contrasena, $bd);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nombres = $_POST["nombres"];
    $Apellidos = $_POST["Apellidos"];
    $Correo = $_POST["Correo"];
    $Telefono = $_POST["Telefono"];
    $Contraseña = $_POST["Contraseña"];
    $fecha = $_POST["fecha"];

    $consulta = "INSERT INTO Register (nombres, apellidos, correo, telefono, fecha_nacimiento, contraseña) VALUES ('$Nombres', '$Apellidos', '$Correo', '$Telefono', '$fecha', '$Contraseña')";

    if ($conexion->query($consulta) === TRUE) {
        header("Location: login.html");
        exit;
    } else {
        echo "Error al registrar el usuario: " . $conexion->error;
    }
}

$conexion->close();
?>