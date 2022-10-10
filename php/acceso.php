<?php
require './valores_sesion.php';

require_once "../config/conexion.php";

 $usuario = $_POST['usuario'];
 $contrasena = $_POST['contrasena'];

$sql ="SELECT usuario FROM usuario WHERE usuario='$usuario' and contrasena='$contrasena' ";
$validar_login= mysqli_query($conexion,$sql);


if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $usuario;
      
      //Se realiza INNER JOIN para juntar las tablas de roles y usuarios.
      $sqlrol ="SELECT * FROM usuario 
      INNER JOIN rol ON usuario.id_rol = rol.id_rol
      WHERE usuario = '$usuario'";
      $tabla_rol= mysqli_query($conexion,$sqlrol);

      $rol = mysqli_fetch_array($tabla_rol);

      echo $rol['rol'];
      
      //Se pone los case para cada rol del usuario
      switch($rol['rol']){
        case 'Rol Cliente':
            header('location: ../tienda.php');
        break;

        case 'Rol Administrador':
            header('location: ../admin/index.php');
        break;
      }

    mysqli_close($conexion);

}else{
    echo '
    <script> 
      alert("Número y/o contraseña incorrectos, verifique sus datos");
      window.location = "../views/login.html";
    </script>
    ';
    mysqli_close($conexion);
}

?>
