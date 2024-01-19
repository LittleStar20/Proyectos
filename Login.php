<?php
session_start();

$host = "localhost";
$user = "root";
$contrasena = "";
$bd = "Hojadevida";

$conexion = new mysqli($host, $user, $contrasena, $bd);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Correo = $_POST["Correo"];
    $Contraseña = $_POST["Contraseña"];

    $consulta = "SELECT * FROM Register WHERE correo = '$Correo' AND contraseña = '$Contraseña'";

    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows == 1) {

        header("Location: prueba.html");
        exit;
    } else {
        echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }
}

$conexion->close();
?>