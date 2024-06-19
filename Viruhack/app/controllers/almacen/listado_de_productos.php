<?php
$sql_productos="select *, cat.nombre_categoria as categoria, u.email as email
FROM tb_almacen as a INNER JOIN tb_categorias as cat ON a.id_categoria = cat.id_categoria
INNER JOIN  tb_usuarios as u on u.id_usuario = a.id_usuario;";
$query_productos=$conn->prepare($sql_productos);
$query_productos->execute();
$productos_datos=$query_productos->fetchAll (PDO::FETCH_ASSOC);