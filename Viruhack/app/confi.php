<?php
$servername = "localhost";
$baseDeDatos="chivistore";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$baseDeDatos", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "LA CONEXION ES EXITOSA";
} catch(PDOException $e) {
  echo "EROR AL CONECTAR  LA BASE D DATOS: " . $e->getMessage();
}
$url="http://Localhost/Viruhack";
date_default_timezone_set("America/Mexico_City");
$fechaHora=date('y-m-d H:i:s');
?>
<?php
if (isset($_SESSION['mensaje'])){
    $respuesta=$_SESSION['mensaje'];?>
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "<?php echo "$respuesta"?>",
            showConfirmButton: false,
            timer: 2000
        })
    </script>
<?php
    unset($_SESSION['mensaje']);
}
?>