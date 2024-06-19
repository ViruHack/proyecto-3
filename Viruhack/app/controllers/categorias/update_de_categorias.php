<?php
 include ("../../confi.php");
 $nombre_categoria=$_GET['nombre_categoria'];
 $id_categoria=$_GET['id_categoria'];
    $sentencia=$conn->prepare("UPDATE tb_categorias 
    SET nombre_categoria=:nombre_categoria,fyh_actualizacion=:fyh_actualizacion 
    WHERE id_categoria=:id_categoria");

    $sentencia->bindParam('nombre_categoria',$nombre_categoria);
    $sentencia->bindParam('fyh_actualizacion',$fechaHora);
    $sentencia->bindParam('id_categoria',$id_categoria);
   if($sentencia->execute()){ 
    session_start();
    $_SESSION['mensaje']="Se actualizo la categoria de manera correcta";
    $_SESSION['icono']="seccess";
    ?>
     <script>
        location.href = "<?php echo $url;?>/categorias";
    </script>
<?php
   }else{
    session_start();
    $_SESSION['mensaje']="Error ourrio un problema";
    $_SESSION['icono']="Error";
    ?>
     <script>
        location.href = "<?php echo $url;?>/categorias";
    </script>
<?php
}
?>