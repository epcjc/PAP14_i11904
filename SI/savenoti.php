<?php
include 'utnoticias.php';
$usuario = new Usuarios();
$usuario->save($_POST);
 
header('Location: noticiasbackup.php');
?>
