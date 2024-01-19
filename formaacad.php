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
    $nombreInstitucion = $_POST["nombreInstitucion"];
    $tituloObtenido = $_POST["tituloObtenido"];
    $periodo = $_POST["periodo"];
    $nivelEducacion = $_POST["nivelEducacion"];

    $consulta = "INSERT INTO formacionAcade (nombre_institucion, titulo_obtenido, periodo, nivel_educacion) 
    VALUES ('$nombreInstitucion', '$tituloObtenido', '$periodo', '$nivelEducacion')";

    if ($conexion->query($consulta) === TRUE) {
        header("Location: prueba.html");
        exit;
    } else {
        echo "Error al registrar el usuario: " . $conexion->error;
    }
}

$conexion->close();
?>