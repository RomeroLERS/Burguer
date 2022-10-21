<?php
require_once "../config/conexion.php";
// Para Ediatr el formulario de Productos
if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['cantidad']) && isset($_POST['descripcion']) 
&& isset($_POST['precio_normal']) && isset($_POST['precio_rebajado'])
&& isset($_POST['categoria'])){
  
   
    $conexion->query("update productos set
                                  id='".$_POST['id']."',
                                  nombre='" . $_POST['nombre'] ."',
                                  cantidad='" . $_POST['cantidad'] . "',
                                  descripcion='" . $_POST['descripcion'] . "',
                                  precio_normal='" . $_POST['precio_normal'] . "',
                                  precio_rebajado='" . $_POST['precio_rebajado'] ."',
                                  id_categoria='" . $_POST['categoria'] . "'
                                  
                                  where id=".$_POST['id']);
                                  header("Location: productos.php?success");                     
}

?>