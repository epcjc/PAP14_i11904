<?php
include 'utilizador.php';
$usuario = new Usuarios();
$usuario->save($_POST);
 
header('Location: Registo.php');
?>