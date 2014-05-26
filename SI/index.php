<?php

include_once'template.php';

$tplC = file_get_contents("Template/conteudo.tpl");
$conteudo= str_replace("_Title_", "Sobre Nós", $tplC);






        


$tplM = str_replace("_Conteudo_", $conteudo, $tplM);



print $tplM;
?>