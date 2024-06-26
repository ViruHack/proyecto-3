<?php
include ('../app/confi.php');
include ('../layout/session.php');
include ('../layout/parte1.php');
include ("../app/controllers/roles/update_roles.php");
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Edicion de un rol</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Llene los datos con cuidado</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="card-body" style="display: block;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="../app/controllers/roles/update.php" method="post">
                                            <div class="form-group">
                                                <label for="">Nombre del rol</label>
                                                <input type="text" name="rol" class="form-control" placeholder="Escriba aqui el rol..." value="<?php echo $rol;?>" required>
                                                <input type="hidden" name="id_rol" value ="<?php echo $id_rol_get;?>">
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                                <button type="submit" class="btn btn-success">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>