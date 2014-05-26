<?php

include_once'template.php';

$tplC = file_get_contents("Template/Noticias.tpl");
$conteudo= str_replace("_Title_", "Noticias", $tplC);




$tplM = str_replace("_Conteudo_", $conteudo, $tplM);



print $tplM;
?>

