<?php
require_once "../config/conexion.php";
//Nuevo Categoria insertar
if (isset($_POST)) {
    if (!empty($_POST)) {
        $categoriaC = $_POST['categoriaC'];
        $query = mysqli_query($conexion, "INSERT INTO categorias(categoria) VALUES ('$categoriaC')");
        if ($query) {
            header('Location: categorias.php');
        }
    }
}
?>