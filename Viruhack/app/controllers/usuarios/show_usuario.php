<?php
 $id_usuario_get = $_GET ['id'];
 $sql_usuarios="select us.id_usuario as id_usuario, us.nombres as nombres, us.email as email, rol.rol as rol from tb_usuarios as us INNER JOIN tb_roles as rol ON us.id_rol=rol.id_rol WHERE id_usuario = '$id_usuario_get'";
 $query_usuarios=$conn->prepare($sql_usuarios);
 $query_usuarios->execute();
 $usuarios_datos=$query_usuarios->fetchAll (PDO::FETCH_ASSOC);

 foreach($usuarios_datos as $usuarios_dato){
    $nombres = $usuarios_dato['nombres'];
    $email = $usuarios_dato['email'];
    $rol = $usuarios_dato['rol'];
 }
?>