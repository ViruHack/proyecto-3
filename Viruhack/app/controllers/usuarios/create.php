<?php
include ("../../confi.php");
$nombres=$_POST['nombres'];
$email=$_POST['email'];
$id_rol=$_POST['rol'];
$password_user=$_POST['password_user'];
$password_repeat=$_POST['password_repeat'];
if ($password_user==$password_repeat){
    $password_user = password_hash("$password_user", PASSWORD_DEFAULT);
    $sentencia=$conn->prepare("INSERT INTO tb_usuarios 
     (nombres, email, id_rol, password_user, fyh_creacion) 
VALUES (:nombres, :email,:id_rol,  :password_user, :fyh_creacion)");

    $sentencia->bindParam('nombres',$nombres);
    $sentencia->bindParam('email',$email);
    $sentencia->bindParam('id_rol',$id_rol);
    $sentencia->bindParam('password_user',$password_user);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    $sentencia->execute();
    session_start();
    $_SESSION['mensaje']="Se registro al usuario de la manera correcta";
    header('Location: '.$url.'/usuarios/');
}else{
    echo "Error las contraseñas no son iguales";
    session_start();
    $_SESSION['mensaje']="Error las contraseñas no son iguales";
    header('Location: '.$url.'/usuarios/create.php');
}



?>