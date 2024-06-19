<?php
include ("../../confi.php");
$rol=$_POST['rol'];

    $sentencia=$conn->prepare("INSERT INTO tb_roles 
     (rol, fyh_creacion) 
VALUES (:rol, :fyh_creacion)");

    $sentencia->bindParam('rol',$rol);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    if($sentencia->execute()){
        session_start();
    $_SESSION['mensaje']="Se registro al rol de la manera correcta";
    $_SESSION['icono']="succes";
    header('Location: '.$url.'/roles/');
    }else{ 
    echo "Error las contraseñas no son iguales";
    session_start();
    $_SESSION['mensaje']="Error no se pudo registrar en la base de datos";
    $_SESSION['icono']="Error";
    header('Location: '.$url.'/roles/create.php');
    }




?>