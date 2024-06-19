<?php
include ('../app/confi.php');
include ('../layout/session.php');
include ("../app/controllers/almacen/listado_de_productos.php");
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
                        <h1 class="m-0">Listado de productos</h1>
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
                                <h3 class="card-title">PRODUCTOS registrados</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="card-outline"><i class="fas fa-minus"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="card-body" style="display: block;">
                                <table id="example1" class="table table-responsive">
                                    <thead>
                                    <tr>
                                        <th><center>Nro</center></th>
                                        <th><center>codigo</center></th>
                                        <th><center>categoria</center></th>
                                        <th><center>nombre</center></th>
                                        <th><center>imagen</center></th>
                                        <th><center>descripcion</center></th>
                                        <th><center>stock</center></th>
                                        <th><center>stock_minimo</center></th>
                                        <th><center>stock maximo</center></th>
                                        <th><center>precio compra</center></th>
                                        <th><center>precio venta</center></th>
                                        <th><center>fecha compra</center></th>
                                        <th><center>usuario</center></th>
                                        <th><center>acciones</center></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contador=0;
                                    foreach ($productos_datos as $productos_dato){ 
                                        $id_producto= $productos_dato['id_producto']?>

                                    <tr>
                                        <td><?php echo $contador = $contador + 1 ;?></td>
                                        <td><?php echo $productos_dato['codigo'];?></td>
                                        <td><?php echo $productos_dato['categoria'];?></td>
                                        <td><?php echo $productos_dato['nombre'];?></td>
                                        <td>
                                            <img src="<?php echo $url."/almacen/img_productos/".$productos_dato['imagen'];?>" width="50px" alt="leooo">
                                        </td> 
                                        <td><?php echo $productos_dato['descripcion'];?></td>
                                        <td><?php echo $productos_dato['stock'];?></td>
                                        <td><?php echo $productos_dato['stock_minimo'];?></td>
                                        <td><?php echo $productos_dato['stock_maximo'];?></td>
                                        <td><?php echo $productos_dato['precio_compra'];?></td>
                                        <td><?php echo $productos_dato['precio_venta'];?></td>
                                        <td><?php echo $productos_dato['fecha_ingreso'];?></td>
                                        <td><?php echo $productos_dato['email'];?></td>
                                        <td>
                                        <div class="btn-group">
                                                    <a  href="" type="button" class="btn btn-info"><i class="fa fa-eye"></i> Ver</a>
                                                    <a  href="" type="button" class="btn btn-success"><i class="fa fa-pencil-alt"></i>Editar</a>
                                                    <a  href=""type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</a>
                                                </div>
                                        </td>
                                    </tr>    

                                        <?php
                                    }
                                    ?>
                                    </tbody>

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
              "info": "Mostrando START a END de TOTAL Roles",
              "infoEmpty": "Mostrando 0 to 0 of 0 Roles",
              "infoFiltered": "(Filtrado de MAX total Roles)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar_MENU_Roles",
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
