<?php
include ('../app/confi.php');
include ('../layout/session.php');
include ("../app/controllers/usuarios/listado_de_usuarios.php");
include ('../layout/parte1.php');
if (isset($_SESSION['mensaje'])){
    $respuesta=$_SESSION['mensaje'];?>
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "<?php echo "$respuesta"?>",
            showConfirmButton: false,
            timer: 2000
        })
    </script>
    <?php
    unset($_SESSION['mensaje']);
}
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Listado de usuarios</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Usuarios registrados</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="card-outline"><i class="fas fa-minus"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="card-body" style="display: block;">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th><center>Nro</center></th>
                                        <th><center>Nombres</center></th>
                                        <th><center>Email</center></th>
                                        <th><center>Rol del usuario</center></th>
                                        <th><center>Acciones</center></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contador=0;
                                    foreach ($usuarios_datos as $usuarios_datos){
                                        $id_usuario=$usuarios_datos['id_usuario'];
                                        ?>
                                        <tr>
                                            <td><?php echo $contador= $contador +1 ?></td>
                                            <td><?php echo $usuarios_datos['nombres'] ?></td>
                                            <td><?php echo $usuarios_datos['email'] ?></td>
                                            <td><center><?php echo $usuarios_datos['rol'] ?></center></td>
                                            <td><div class="btn-group">
                                                    <a  href="show.php?id=<?php echo $id_usuario;?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i> Ver</a>
                                                    <a  href="update.php?id=<?php echo $id_usuario;?>" type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i>Editar</a>
                                                    <a  href="delete.php?id=<?php echo $id_usuario;?>"type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</a>
                                                </div></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th><center>Nro</center></th>
                                        <th><center>Nombres</center></th>
                                        <th><center>Email</center></th>
                                        <th><center>Rol del usuario</center></th>
                                        <th><center>Acciones</center></th>

                                    </tr>
                                    </tfoot>
                                </table>
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

<?php include ('../layout/parte2.php'); ?>
<?php include ('../layout/mensajes.php'); ?>

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 10,
          "language": {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando START a END de TOTAL Usuarios",
              "infoEmpty": "Mostrando 0 to 0 of 0 Usuarios",
              "infoFiltered": "(Filtrado de MAX total Usuarios)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar_MENU_Usuarios",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscador:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
             },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'copiar',
                    extend: 'copy',
                }, {
                    extend: 'pdf',
                }, {
                    extend: 'csv',
                }, {
                    extend: 'excel',
                }, {
                    text: 'Imprimir',
                    extend: 'print'
                }
            ]
            },
            {
                extend: 'colvis',
                text: 'Vista de Columna',
                collectionLayout: 'fixed three-column'
            }

        ],


        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
