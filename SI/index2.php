<?php
$tplM = file_get_contents("Template/main2.tpl");
$tplMenu = file_get_contents("template.php");
$tplC= file_get_contents("Template/conteudo2.tpl");

$conteudo1 =  str_replace("_Title_","Agencia de contabilidade",$tplC);
$conteudo1 = str_replace("_Conteudo_", "Informações", $conteudo1);

$tplM= str_replace("_Menu_",$conteudo1,$tplM);
print $tplM;
?>
