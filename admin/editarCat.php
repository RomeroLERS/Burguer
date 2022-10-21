<?php
require_once "../config/conexion.php";
// Para Editar el fomulario de Categorias 
if (isset($_POST['id']) && isset($_POST['categoria'])) {


    $conexion->query("update categorias set
                                  id='" . $_POST['id'] . "',
                                  categoria='" . $_POST['categoria'] . "'
                                  
                                  where id=" . $_POST['id']);
    header("Location: categorias.php?success");
}
?>