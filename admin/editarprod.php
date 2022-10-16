<?php
require_once "../config/conexion.php";

if(isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['cantidad'])&& isset($_POST['descripcion'])&& isset($_POST['p_normal']) && isset($_POST['p_normal']) && isset($_POST['p_rebajado']) && isset($_POST['categoria']) && isset($_POST['fot']) ){
  
   
    $conexion->query("update areas set
                                  id_area='".$_POST['matricula']."',
                                  areas='".$_POST['nombre']."'
                                  
                                  where id_area=".$_POST['matricula']);
                                  header("Location: areauditoria.php?success");                     
}
if (isset($_POST)) {
    if (!empty($_POST)) {
        $nombre = $_POST['nombre'];
        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['descripcion'];
        $p_normal = $_POST['p_normal'];
        $p_rebajado = $_POST['p_rebajado'];
        $categoria = $_POST['categoria'];
        $img = $_FILES['foto'];
        $name = $img['name'];
        $tmpname = $img['tmp_name'];
        $fecha = date("YmdHis");
        $foto = $fecha . ".jpg";
        $destino = "../assets/img/" . $foto;
        $query = mysqli_query($conexion, "INSERT INTO productos(nombre, descripcion, precio_normal, precio_rebajado, cantidad, imagen, id_categoria) VALUES ('$nombre', '$descripcion', '$p_normal', '$p_rebajado', $cantidad, '$foto', $categoria)");
        if ($query) {
            if (move_uploaded_file($tmpname, $destino)) {
                header('Location: productos.php');
            }
        }
    }
}
<button class="btn btn-success btnEditar"
 data-nombre="<?php echo $data['nombre']; ?>" 
 data-descripcion="<?php echo $data['descripcion']; ?>" 
 data-normal="<?php echo $data['precio_normal']; ?>" 
 data-rebajado="<?php echo $data['precio_rebajado']; ?>" 
 data-cantidad="<?php echo $data['cantidad']; ?>" 
 data-categoria="<?php echo $data['categoria']; ?>" 
 data-toggle="modal" data-target="#modalEditar">
                                    <i class="fa fa-edit"></i></button>
