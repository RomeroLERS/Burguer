<?php
require_once "../config/conexion.php";
//Eliminar Datos de la Base de Datos
if (isset($_GET)) {
    if (!empty($_GET['accion']) && !empty($_GET['id'])) {
        require_once "../config/conexion.php";
        $id = $_GET['id'];
        //Eliminar Producto
        if ($_GET['accion'] == 'pro') {
            $query = mysqli_query($conexion, "DELETE FROM productos WHERE id = $id");
            if ($query) {
                header('Location: productos.php');
            }
        }
        //Eliminar Categorias
        if ($_GET['accion'] == 'cat') {
            $query = mysqli_query($conexion, "DELETE FROM categorias WHERE id = $id");
            if ($query) {
                header('Location: categorias.php');
            }
        }
        //Eliminar Usuario
        if ($_GET['accion'] == 'usu') {
            $query = mysqli_query($conexion, "DELETE FROM usuario WHERE id_usuario = $id");
            if ($query) {
                header('Location: usuarios.php');
            }
        }
    }
}
?>