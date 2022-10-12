<?php
require './valores_sesion.php';

require_once "./conexion.php";

$user = $_POST['usuario'];
$clave = $_POST['clave'];

$sql = "SELECT usuario FROM usuario WHERE usuario='$user' and clave='$clave' ";
$validar_login = mysqli_query($conexion, $sql);


if (mysqli_num_rows($validar_login) > 0) {
  $_SESSION['usuario'] = $user;

  //Se realiza INNER JOIN para juntar las tablas de roles y usuarios.
  $sqlrol = "SELECT * FROM usuario 
      INNER JOIN rol ON usuario.id_rol = rol.id_rol
      WHERE usuario = '$user'";
  $tabla_rol = mysqli_query($conexion, $sqlrol);

  $rol = mysqli_fetch_array($tabla_rol);

  echo $rol['rol'];

  //Se pone los case para cada rol del usuario
  switch ($rol['rol']) {
    case 'Rol Cliente':
      header('location: ../tienda.php');
      break;

    case 'Rol Administrador':
      require_once "conexion.php";
      $user = mysqli_real_escape_string($conexion, $_POST['usuario']);
      $clave = mysqli_real_escape_string($conexion, $_POST['clave']);
      $query = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario = '$user' AND clave = '$clave'");
      mysqli_close($conexion);
      $resultado = mysqli_num_rows($query);
      if ($resultado > 0) {
        $dato = mysqli_fetch_array($query);
        $_SESSION['active'] = true;
        $_SESSION['id'] = $dato['id_usuario'];
        $_SESSION['nombre'] = $dato['nombre'];
        $_SESSION['user'] = $dato['usuario'];
        header('Location: ../admin/productos.php');
      } else {
        $alert = '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                        Contraseña incorrecta
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
        session_destroy();
      }
      break;
  }

  mysqli_close($conexion);
} else {
  echo '
    <script> 
      alert("Número y/o contraseña incorrectos, verifique sus datos");
      window.location = "../views/login.html";
    </script>
    ';
  mysqli_close($conexion);
}
