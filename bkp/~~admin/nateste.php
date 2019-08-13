<?php
if($_SESSION['id_tipo_func'] == 1){
    session_start();
}
else{
    session_destroy();
}
include("conexao.php");
header('Content-Type: text/html; charset=utf-8');


echo $_SESSION['mat_func'];
echo $_SESSION['nome_func'];
echo $_SESSION['maxmat'];

?>