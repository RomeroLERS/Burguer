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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Categorias</h1>
    </div>
    <div class="align-items-center justify-content-between mb-4 text-right">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#categorias">
            <i class="fa fa-plus mr-2"></i>Nuevo Producto</button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" style="width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($conexion, "SELECT * FROM categorias ORDER BY id DESC");
                        while ($data = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['categoria']; ?></td>
                                <td><button class="btn btn-info btnEditar" data-id="<?php echo $data['id']; ?>" data-categoria="<?php echo $data['categoria']; ?>" data-toggle="modal" data-target="#modalEditar">
                                        <i class="fa fa-edit"></i></button></td>
                                <td>
                                    <form method="post" action="eliminar.php?accion=cat&id=<?php echo $data['id']; ?>" class="d-inline eliminar">
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
    <!-- Modal Nueva Categoria -->
    <div id="categorias" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary text-white">
                    <h5 class="modal-title" id="title">Nueva Categoria</h5>
                    <button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="./insertarCat.php" method="POST" autocomplete="off">
                        <div class="form-group">
                            <label for="categoriaC">Nombre</label>
                            <input id="categoriaC" class="form-control" type="text" name="categoriaC" placeholder="Categoria" required>
                        </div>
                        <button class="btn btn-primary" type="submit">Registrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modal Nueva Categoria -->
    <!-- Modal Editar -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="./editarCat.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-header bg-gradient-primary text-white">
                        <h5 class="modal-title" id="modalEditarLabel">Editar Producto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <input type="hidden" id="idEdit" name="id" class="form-control">
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="categoria">Categoria</label>
                                    <input id="categoria1" class="form-control" type="text" name="categoria" required>
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
    <script src="./editarCat.js"></script>
    <?php include("includes/footer.php"); ?>
</body>

</html>