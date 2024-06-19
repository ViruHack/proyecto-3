<?php
 $id_rol_get = $_GET ['id'];
 $sql_rol="SELECT * FROM tb_roles WHERE id_rol = '$id_rol_get'";
 $query_rol=$conn->prepare($sql_rol);
 $query_rol->execute();
 $rol_datos=$query_rol->fetchAll (PDO::FETCH_ASSOC);

 foreach($rol_datos as $rol_dato){
    $rol = $rol_dato['rol'];

 }
?>