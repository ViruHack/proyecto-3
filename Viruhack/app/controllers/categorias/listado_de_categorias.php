<?php
$sql_categorias="SELECT * FROM tb_categorias ";
$query_categorias=$conn->prepare($sql_categorias);
$query_categorias->execute();
$categorias_datos=$query_categorias->fetchAll (PDO::FETCH_ASSOC);