<?php
if($_SESSION['id_tipo_func'] == 1){
    session_start();
}
else{
    session_destroy();
}
session_destroy();
header('Location: ../index.php');
header('Content-Type: text/html; charset=utf-8');
exit();
?>