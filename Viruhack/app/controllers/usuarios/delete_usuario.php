<?php

include ("../../confi.php");
$id_usuario=$_POST['id_usuario'];
   $sentencia=$conn->prepare("DELETE from tb_usuarios WHERE id_usuario=:id_usuario");

   $sentencia->bindParam('id_usuario',$id_usuario);
   $sentencia->execute();
   session_start();
   $_SESSION['mensaje']="Se borro al usuario de la manera correcta";
   $_SESSION['icon']="success";

   header('Location: '.$url.'/usuarios/');

?>
<?php include ('../layout/mensajes.php'); ?>
