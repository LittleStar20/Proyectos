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
    $Nombre = $_POST["Nombre"];
    $Apellido = $_POST["Apellido"];
    $Correo = $_POST["Correo"];
    $Telefono = $_POST["Telefono"];

    $consulta = "INSERT INTO DatosBasicos (nombres, apellidos, correo, telefono) VALUES ('$Nombre', '$Apellido', '$Correo', '$Telefono')";

    if ($conexion->query($consulta) === TRUE) {
        header("Location: prueba.html");
        exit;
    } else {
        echo "Error al registrar el usuario: " . $conexion->error;
    }
}

$conexion->close();
?>