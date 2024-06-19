<?php 
 include ("../../confi.php");
 $rol=$_POST['rol'];
 $id_rol=$_POST['id_rol'];
    $sentencia=$conn->prepare("UPDATE tb_roles SET rol=:rol,fyh_actualizacion=:fyh_actualizacion WHERE id_rol=:id_rol");

    $sentencia->bindParam('rol',$rol);
    $sentencia->bindParam('fyh_actualizacion',$fechaHora);
    $sentencia->bindParam('id_rol',$id_rol);
   if($sentencia->execute()){ 
    session_start();
    $_SESSION['mensaje']="Se actualizo el rol de manera correcta";
    $_SESSION['icono']="seccess";
    header('Location: '.$url.'/roles/');
   }else{
    session_start();
    $_SESSION['mensaje']="Error ourrio un problema";
    $_SESSION['icono']="Error";
    header('Location: '.$url.'/roles/update.php?id='.$id_rol);
}
 
?>
<?php include ('../layout/mensajes.php'); ?>