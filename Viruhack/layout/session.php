<?php
session_start();
if(isset($_SESSION['session_email'])){
    //echo"si existe sesion de ".$_SESSION['session_email'];
    $email_session=$_SESSION['session_email'];
    $sql="SELECT us.id_usuario as id_usuario, us.nombres as nombres, us.email as email, rol.rol as rol from tb_usuarios as us INNER JOIN tb_roles as rol ON us.id_rol=rol.id_rol WHERE email = '$email_session';";
    $query=$conn->prepare($sql);
    $query->execute();
    $usuarios=$query->fetchAll (PDO::FETCH_ASSOC);
    foreach($usuarios as $usuario){
        $nombres_session = $usuario['nombres'];
        $rol_session = $usuario['rol'];
        $id_usuario_sesion = $usuario['id_usuario'];
    }
}
else{
    echo ("no existe sesion");
    header('Location:'.$url.'/login');
}
?>
