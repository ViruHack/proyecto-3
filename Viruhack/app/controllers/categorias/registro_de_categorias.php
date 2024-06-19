<?php

include('../../confi.php');
echo $nombre_categoria = $_GET['nombre_categoria'];


$sentencia = $conn->prepare("INSERT INTO tb_categorias 
(nombre_categoria, fyh_creacion) 
VALUES (:nombre_categoria, :fyh_creacion)");

$sentencia->bindParam('nombre_categoria', $nombre_categoria);
$sentencia->bindParam('fyh_creacion', $fechaHora);
if ($sentencia->execute()) {
    session_start();
    $_SESSION['mensaje'] = "Se registro la categoria de la manera correcta";
    $_SESSION['icono'] = "succes";
    ?>

    <script>
        location.href = "<?php echo $url;?>/categorias";
    </script>

    <?php
} else {
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
    $_SESSION['icono'] = "Error";
    ?>
      <script>
        location.href = "<?php echo $url;?>/categorias";
    </script>
    <?php
}


