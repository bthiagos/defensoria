<?php
session_start();
session_destroy();
header('Location: index.php');
header('Content-Type: text/html; charset=utf-8');
exit();
?>