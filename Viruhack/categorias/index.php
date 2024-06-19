<?php
include('../app/confi.php');
include('../layout/session.php');
include("../app/controllers/categorias/listado_de_categorias.php");
include('../layout/parte1.php');
if (isset($_SESSION['mensaje'])) {
    $respuesta = $_SESSION['mensaje']; ?>
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "<?php echo "$respuesta" ?>",
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
                    <h1 class="m-0">Listado de categorias
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                           <i class="fa fa-plus"></i> Nuevo 
                        </button>
                    </h1>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">CATEGORIAS registradas</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="card-outline"><i
                                        class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            <center>Nro</center>
                                        </th>
                                        <th>
                                            <center>Nombre del categoria</center>
                                        </th>
                                        <th>
                                            <center>Acciones</center>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($categorias_datos as $categorias_dato) {
                                        $id_categoria = $categorias_dato['id_categoria'];
                                        $nombre_categoria = $categorias_dato['nombre_categoria'];?>
                                        <tr>
                                            <td>
                                                <?php echo $contador = $contador + 1 ?>
                                            </td>
                                            <td>
                                                <?php echo $categorias_dato['nombre_categoria'] ?>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target="#modal_update<?php echo $id_categoria;?>">

                                                    <i class="fa fa-pencil-alt"></i> Editar
                                    </button>
                                    <div class="modal fade" id="modal_update<?php echo $id_categoria;?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header" style="...">
                                            <h4 class="modal-title">Actualizacion de la categoria</h4>
                                            <button type="button" class="close" data-dismiss="modal" arial-label="Close">
                                                <span aria-hidden="true">x</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Nombre de la categoria</label>
                                                    <input type="text" id="nombre_categoria<?php echo $id_categoria;?>" value="<?php echo $nombre_categoria;?>" class="form-control">
                                                </div>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="modal-footer  justify-content-between">
                                                    <button type ="button" class="btn btn-default" data-dismiss="modal">CANCELAR</button>
                                                    <button type ="button" class="btn btn-success" id="btn_update<?php echo $id_categoria;?>">ACTUALIZAR</button>
                                                    <small style="color:red; display:none" id="lbl_create<?php echo $id_categoria;?>">*ESTE CAMPO ES REQUERIDO</small>
                                    </div>
                                    </div>
                                    </div>
                                    </div>
                                    <script>
                                        $('#btn_update<?php echo $id_categoria;?>').click(function () {
                                            var nombre_categoria = $('#nombre_categoria<?php echo $id_categoria;?>').val();
                                            var id_categoria = '<?php echo $id_categoria;?>';
                                                if(nombre_categoria == ""){
                                                    $('#nombre_categoria<?php echo $id_categoria;?>').focus();
                                                    $('#lbl_update<?php echo $id_categoria;?>').css('display','block');
                                                }else{ 
                                                      var url ="../app/controllers/categorias/update_de_categorias.php";
                                                $.get(url,{nombre_categoria:nombre_categoria,id_categoria:id_categoria},function (datos) {
                                                    $('#respuesta_update<?php echo $id_categoria;?>').html(datos);
        });
        }
      
        //alert(nombre_categoria);
    });

                                        </script>
                                        <div id="respuesta_update<?php echo $id_categoria;?>"></div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>
                                            <center>Nro</center>
                                        </th>
                                        <th>
                                            <center>Nombre del categoria</center>
                                        </th>
                                        <th>
                                            <center>Acciones</center>
                                        </th>
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

<?php include('../layout/parte2.php'); ?>
<?php include('../layout/mensajes.php'); ?>

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

<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Creacion de una nueva categoria</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nombre de la categoria<b>*</b></label>
                            <input type="text" id="nombre_categoria" class="form-control">
                            <small style="color:red; display:none" id="lbl_create">*ESTE CAMPO ES REQUERIDO</small>
                        </div>
                    </div>
                </div>
                

        </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_create">Save changes</button>
            </div>
            <a href="../app/controllers/categorias/registro_de_categorias.php"></a>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    $('#btn_create').click(function(){
        //alert("Elmoy");
        var nombre_categoria = $('#nombre_categoria').val();
        if(nombre_categoria == ""){
            $('#nombre_categoria').focus();
            $('#lbl_create').css('display','block');
        }else{ 
              var url ="../app/controllers/categorias/registro_de_categorias.php";
        $.get(url,{nombre_categoria:nombre_categoria},function (datos) {
            $('#respuesta').html(datos);
        });
        }
      
        //alert(nombre_categoria);
    });
</script>
<div id="respuesta"></div>
