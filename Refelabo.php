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
    $companyname = $_POST["companyname"];
    $contactname = $_POST["contactname"];
    $contactemail = $_POST["contactemail"];

    $familyname = $_POST["familyname"];
    $relationship = $_POST["relationship"];

    $consulta = "INSERT INTO RefeLaFa (nombrempresa, nombreconta, correo, nombrefam, parentesco) 
    VALUES ('$companyname', '$contactname', '$contactemail', '$familyname', '$relationship')";

    if ($conexion->query($consulta) === TRUE) {
        header("Location: prueba.html");
        exit;
    } else {
        echo "Error al registrar el usuario: " . $conexion->error;
    }
}

$conexion->close();
?>