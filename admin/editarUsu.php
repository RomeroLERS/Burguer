<?php
require_once "../config/conexion.php";
// Para Ediatr el formulario de Productos
if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['usuario']) && isset($_POST['clave']) 
&& isset($_POST['rol'])){
  
   
    $conexion->query("update usuario set
                                  id_usuario='".$_POST['id']."',
                                  nombre='" . $_POST['nombre'] ."',
                                  usuario='" . $_POST['usuario'] . "',
                                  clave='" . $_POST['clave'] . "',
                                  id_rol='" . $_POST['rol'] . "'
                                  
                                  where id_usuario=".$_POST['id']);
                                  header("Location: usuarios.php?success");                     
}