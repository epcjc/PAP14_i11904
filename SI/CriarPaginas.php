
<?php
//include_once 'valida.php'; Acesso Publico
include_once'template.php';
$tplCL = file_get_contents("Template/linha_page.tpl");
$tplC = "";
$dir = dirname(__FILE__)."/paginas";
clearstatcache();



if(is_dir($dir)){
    if($dh = opendir($dir)) {
        while(($file = readdir($dh)) !== false) {
            if ($file != '.' && $file != '..') {
             $ll = str_replace("#nome", $file, $tplCL);
             $ll = str_replace("#url", 'paginas/'.urlencode($file) , $ll);
             $ll = str_replace("#ops","<a href = 'CriarPagina.php?op=del&name=$file'>Remover</a>",$ll);
             $tplC .= $ll ;
             } 
        }
        closedir($dh);
        $tplC = str_replace("#lista",$tplC,  file_get_contents("Template/page.tpl"));
     
    }
}

if(isset($_GET['op'])){
    switch ($_GET['op']){
        case 'del': unlink($dir.'/'.$_GET['name']);break;
        case 'nova';
            if(isset($_POST['Nome'])&& isset($_POST['conteudo'])){
                $_POST['Nome'] = trim($_POST['Nome']);
                $conteudo = file_get_contents("Template/conteudo.tpl");
                $conteudo = str_replace("_Title_", $_POST['Nome'], $conteudo);
                $conteudo = str_replace("_Conteudo_", $_POST['conteudo'], $conteudo);
                file_put_contents('paginas/'. $_POST['Nome'].'.html', str_replace("_Conteudo_",$conteudo,$tplM));
            }
            break;
        case 'criar': $tplC .='</br>' .file_get_contents("Template/newpage.tpl"); ;break;
        default :break;
    }
}

$tplM = str_replace("_Conteudo_", $tplC, $tplM);
print $tplM;

?>
