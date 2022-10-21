<?php
require_once "../config/conexion.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

</head>
<boody>

    <?php
    include("includes/header.php")
    ?>
    <div class=" d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 ">Productos</h1>
    </div>
    <div class="align-items-center justify-content-between mb-4 text-right">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#productos">
            <i class="fa fa-plus mr-2"></i>Nuevo Producto</button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" style="width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio Normal</th>
                            <th>Precio Rebajado</th>
                            <th>Cantidad</th>
                            <th>Categoria</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conexion, "SELECT p.*, c.id AS id_cat, c.categoria FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria ORDER BY p.id DESC");
                        while ($data = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><img class="img-thumbnail" src="../assets/img/<?php echo $data['imagen']; ?>" width="50"></td>
                                <td><?php echo $data['nombre']; ?></td>
                                <td><?php echo $data['descripcion']; ?></td>
                                <td><?php echo $data['precio_normal']; ?></td>
                                <td><?php echo $data['precio_rebajado']; ?></td>
                                <td><?php echo $data['cantidad']; ?></td>
                                <td><?php echo $data['categoria']; ?></td>

                                <td><button class="btn btn-info btnEditar" data-id="<?php echo $data['id']; ?>" data-nombre="<?php echo $data['nombre']; ?>" data-cantidad="<?php echo $data['cantidad']; ?>" data-descripcion="<?php echo $data['descripcion']; ?>" data-precio_normal="<?php echo $data['precio_normal']; ?>" data-precio_rebajado="<?php echo $data['precio_rebajado']; ?>" data-categoria="<?php echo $data['id_categoria']; ?>" data-toggle="modal" data-target="#modalEditar">
                                        <i class="fa fa-edit"></i></button></td>
                                <td>
                                    <form method="post" action="eliminar.php?accion=pro&id=<?php echo $data['id']; ?>" class="d-inline eliminar">
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
    <!-- Modal Nuevo Producto -->
    <div id="productos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary text-white">
                    <h5 class="modal-title" id="title">Nuevo Producto</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./insertarPro.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input id="cantidad" class="form-control" type="text" name="cantidad" placeholder="Cantidad" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea id="descripcion" class="form-control" name="descripcion" placeholder="Descripción" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="p_normal">Precio Normal</label>
                                    <input id="p_normal" class="form-control" type="text" name="p_normal" placeholder="Precio Normal" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="p_rebajado">Precio Rebajado</label>
                                    <input id="p_rebajado" class="form-control" type="text" name="p_rebajado" placeholder="Precio Rebajado" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria">Categoria</label>
                                    <select id="categoria" class="form-control" name="categoria" required>
                                        <?php
                                        $categorias = mysqli_query($conexion, "SELECT * FROM categorias");
                                        foreach ($categorias as $cat) { ?>
                                            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['categoria']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input type="file" class="form-control" id="foto" name="foto" required>
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
                <form action="./editarprod.php" method="POST" enctype="multipart/form-data">
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
                                    <label for="cantidad">Cantidad</label>
                                    <input id="cantidad1" class="form-control" type="text" name="cantidad" placeholder="Cantidad" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea id="descripcion1" class="form-control" name="descripcion" placeholder="Descripción" rows="3" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="precio_normal">Precio Normal</label>
                                    <input id="precio_normal1" class="form-control" type="text" name="precio_normal" placeholder="Precio Normal" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="precio_rebajado">Precio Rebajado</label>
                                    <input id="precio_rebajado1" class="form-control" type="text" name="precio_rebajado" placeholder="Precio Rebajado" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria">Nuevo Categoria</label>
                                    <select name="categoria" id="categoria1" class="form-control" required>
                                        <?php
                                        $res = $conexion->query("select * from  categorias");
                                        while ($fila = mysqli_fetch_array($res)) {
                                            echo '<option value="' . $fila['id'] . '">' . $fila['categoria'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="imagen">Foto</label>
                                    <input id="imagen1" class="form-control" type="text" name="imagen" placeholder="Imagen" >
                                    <?php
                                    $query = mysqli_query($conexion, "select * from  productos");
                                    while ($data = mysqli_fetch_assoc($query)) { ?>
                                        <tr>
                                            <td><img class="img-thumbnail" src="../assets/img/<?php echo $data['imagen']; ?>" width="50"></td>
                                        </tr>
                                    <?php } ?>
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
    <script src="./editarprod.js"></script>

    <?php include("includes/footer.php"); ?>
    </body>

</html>