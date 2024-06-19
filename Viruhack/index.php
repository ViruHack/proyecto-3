<?php
include('app/confi.php');
include('layout/session.php');
include('layout/parte1.php');
include('app/controllers/usuarios/listado_de_usuarios.php');
include('app/controllers/roles/listado_de_roles.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">BIENVENIDO AL SISTEMA DE VENTAS - <?php echo $rol_session;?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">



        <div class="col-lg-3 col-6">

            <div class="small-box bg-warning">
                <div class="inner">
                    <?php
                    $contador_de_usuarios = 0;
                    foreach ($usuarios_datos as $usuarios_dato)
                        $contador_de_usuarios = $contador_de_usuarios + 1;
                    ?>
                    <h3>
                        <?php echo $contador_de_usuarios; ?>
                    </h3>
                    <p>Usuarios Registrados</p>
                    <a href="usuarios/create.php">
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="usuarios" class="small-box-footer">
                    Mas detalles <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
                <div class="inner">
                    <?php
                    $contador_de_roles = 0;
                    foreach ($roles_datos as $roles_dato)
                        $contador_de_roles = $contador_de_roles + 1;
                    ?>
                    <h3>
                        <?php echo $contador_de_roles; ?>
                    </h3>
                    <p>Roles Registrados</p>
                </div>
                <a href="roles/create.php">
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="roles" class="small-box-footer">
                    Mas detalles <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include('layout/parte2.php'); ?>