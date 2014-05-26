<?php
/* conexão à base de dados vendas*/
$mysql_id = mysql_connect('localhost', 'Diana', '1234');
mysql_select_db('trabalhofinal',$mysql_id);
if(!mysql_select_db('trabalhofinal',$mysql_id)){
die ('Erro'.mysql_error());
}


/*Registo Utilizadores ID=2; */
$query='insert into utilizadores set Username="i11904",Pass="1234", Email="i11904@epcjc.net",Nome="Diana Pinto",Admin=0';
$query='insert into noticias set Titulo_Noticia="Mau tempo no Porto",Resumo="blablablabla", Noticia="blablablabla",Autor="Diana Pinto",Data="11/02/2014"';


$result=mysql_query($query);
if(!$result){
echo(mysql_error());
}
else{
echo("Adicionado o Registo");
}