<?php
require_once "../config/conexion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <?php
    include("includes/header.php")
    ?>
    <!-- Titulo de la tabla -->
    <div class=" d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 ">Usuarios</h1>
    </div>
    <!-- Fin Titulo de la tabla -->
    <!-- Boton de Nuevo Usuario -->
    <div class="align-items-center justify-content-between mb-4 text-right">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#usuarios">
            <i class="fa fa-plus mr-2"></i>Nuevo Usuario</button>
    </div>
    <!-- Fin Boton de Nuevo Usuario -->
    <!-- Inicio de Tabla de Usuarios -->
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" style="width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Rol</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conexion, "SELECT p.*, c.id_rol AS id_rol, c.rol FROM usuario p INNER JOIN rol c ON c.id_rol = p.id_rol ORDER BY p.id_usuario DESC");
                        while ($data = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><?php echo $data['id_usuario']; ?></td>
                                <td><?php echo $data['nombre']; ?></td>
                                <td><?php echo $data['usuario']; ?></td>
                                <td><?php echo $data['clave']; ?></td>
                                <td><?php echo $data['rol']; ?></td>

                                <td><button class="btn btn-info btnEditar" data-id="<?php echo $data['id_usuario']; ?>" data-nombre="<?php echo $data['nombre']; ?>" data-usuario="<?php echo $data['usuario']; ?>" data-clave="<?php echo $data['clave']; ?>" data-rol="<?php echo $data['id_rol']; ?>" data-toggle="modal" data-target="#modalEditar">
                                        <i class="fa fa-edit"></i></button></td>
                                <td>
                                    <form method="post" action="eliminar.php?accion=usu&id=<?php echo $data['id_usuario']; ?>" class="d-inline eliminar">
                                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Inicio de Tabla de Usuarios -->
    <!-- Modal Nuevo Producto -->
    <div id="usuarios" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary text-white">
                    <h5 class="modal-title" id="title">Nuevo Producto</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./insertarUsu.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="usuario">Usuario</label>
                                    <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="clave">Contraseña</label>
                                    <input id="clave" class="form-control" type="text" name="clave" placeholder="Contraseña" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rol">Rol de Usuario</label>
                                    <select id="rol" class="form-control" name="rol" required>
                                        <?php
                                        $categorias = mysqli_query($conexion, "SELECT * FROM rol");
                                        foreach ($categorias as $cat) { ?>
                                            <option value="<?php echo $cat['id_rol']; ?>"><?php echo $cat['rol']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal Nuevo Producto -->
    <!-- Modal Editar -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="./editarUsu.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-header bg-gradient-primary text-white">
                        <h5 class="modal-title" id="modalEditarLabel">Editar Producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="idEdit" name="id" class="form-control">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre1" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="usuario">Usuario</label>
                                    <input id="usuario1" class="form-control" type="text" name="usuario" placeholder="Usuario" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="clave">Contraseña</label>
                                    <textarea id="clave1" class="form-control" name="clave" placeholder="Clave" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="rol">Nuevo Rol</label>
                                    <select name="rol" id="rol1" class="form-control" required>
                                        <option>Nuevo Rol</option>
                                        <?php
                                        $res = $conexion->query("select * from  rol");
                                        while ($fila = mysqli_fetch_array($res)) {
                                            echo '<option value="' . $fila['id_rol'] . '">' . $fila['rol'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success editar">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Fin Modal Editar -->
    <!-- jQuery -->
    <script src="./layouts/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="./layouts/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 4 -->
    <script src="./layouts/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="./editarUsu.js"></script>

    <?php include("includes/footer.php"); ?>
</body>

</html>