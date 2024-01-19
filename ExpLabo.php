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
    $nombreEmpresa = $_POST["nombreEmpresa"];
    $DirreccionEmpresa = $_POST["DirreccionEmpresa"];
    $CargoEmpresa = $_POST["CargoEmpresa"];
    $periodo = $_POST["periodo"];

    $consulta = "INSERT INTO ExpeLabo (nombreem, direccion, cargo, periodoem) 
    VALUES ('$nombreEmpresa', '$DirreccionEmpresa', '$CargoEmpresa', '$periodo')";

    if ($conexion->query($consulta) === TRUE) {
        header("Location: prueba.html");
        exit;
    } else {
        echo "Error al registrar el usuario: " . $conexion->error;
    }
}

$conexion->close();
?>