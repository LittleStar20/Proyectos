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
    $habilidad1 = $_POST["habilidad1"];
    $habilidad2 = $_POST["habilidad2"];
    $habilidad3 = $_POST["habilidad3"];

    $logroReconocimiento1 = $_POST["logroReconocimiento1"];
    $logroReconocimiento2 = $_POST["logroReconocimiento2"];

    $interesAficion1 = $_POST["interesAficion1"];
    $interesAficion2 = $_POST["interesAficion2"];

    $consulta = "INSERT INTO PerfilPro (habi1, habi2, habi3, logroR1, logroR2, inter1, inter2) 
    VALUES ('$habilidad1', '$habilidad2', '$habilidad3', '$logroReconocimiento1', '$logroReconocimiento2', '$interesAficion1', '$interesAficion2')";

    if ($conexion->query($consulta) === TRUE) {
        header("Location: prueba.html");
        exit;
    } else {
        echo "Error al registrar el usuario: " . $conexion->error;
    }
}

$conexion->close();
?>