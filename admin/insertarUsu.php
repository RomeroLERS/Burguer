<?php
require_once "../config/conexion.php";
// Nuevo Usuario insertar
if (isset($_POST)) {
    if (!empty($_POST)) {
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $rol = $_POST['rol'];
        $query = mysqli_query($conexion, "INSERT INTO usuario(nombre, usuario, clave, id_rol) 
        VALUES ('$nombre', '$usuario', '$clave', '$rol')") 
        or die($conexion->error);
        header("Location: usuarios.php?success");
    }
}
?>
