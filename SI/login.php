<?php

session_start();

if( !isset($_SESSION['username']) ){
    
    include_once 'Admin/cfg/cfg2.php';    
    include_once 'template.php';
    
    $tplM= str_replace("_Conteudo_", file_get_contents('Template/login.tpl'), $tplM);
    $link=mysql_connect($_cfg['mySrv'], $_cfg['myUser'], $_cfg['myPw'])or die("Ocorreu o seguinte erro ao ligar á BD: <br>".mysql_error());
    mysql_select_db($_cfg['myBD'],$link);
    if(isset($_POST['Nome'])){
        $res= mysql_query('select Admin from utilizadores where Username=\''.$_POST['Nome'].'\' and Pass=\''.sha1($_POST['Password']).'\';',$link);
        if($res != null && mysql_num_rows($res)>0)
        {
            $tplM= str_replace("_Conteudo_", 'Bem Vindo :)', $tplM);
            $_SESSION['username'] = $_POST['Nome'] ;
            $_SESSION['Admin']= mysql_result($res, 0,'Admin');
        } else {
            $tplM= str_replace("_Conteudo_", 'Utilizador ou chave invalida!', $tplM);
        }       
    }else{
        $tplM= str_replace("_Conteudo_", '', $tplM);
    }

    $tplM= str_replace("_Conteudo_", '', $tplM);

    print $tplM;
} else {
    
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    $extra = 'index.php';
    header("Location: http://$host$uri/$extra");
    //echo "<script> window.location='index.php' </script>";
     
}
?>
