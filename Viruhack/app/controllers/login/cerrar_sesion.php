<?php
include('../../confi.php');

session_start();
if(isset($_SESSION['session_email'])){
    session_destroy();
    header('Location:'.$url.'/login');
}
?>
