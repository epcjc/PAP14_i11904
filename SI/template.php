<?php
session_start();
$tplM = file_get_contents("Template/main.tpl");
$tplMenu = file_get_contents("Template/menu.tpl");

$menuItems = array(
    'index.php' => 'Sobre Nós',
    'login.php' => 'Iniciar sessao',
    'galeria.php' => 'Galeria',
    
    'Noticias.php' => 'Noticias',
     'logout.php' => 'Sair',);

$menuItemsAdmin = array(
    'Registo.php'=> 'Gestão de utilizadores',
    'noticiasbackup.php'=> 'Noticias Backup',
    'upload.php' => 'Carregar ficheiros',
    'filemanager.php' => 'Gestor de ficheiros',
     'CriarPaginas.php'=>'Criar Paginas',
);

$menu="";
foreach ($menuItems as $key => $value) {
    $tmp = str_replace("_URL_", $key, $tplMenu);
    $tmp = str_replace("_Nome_", $value, $tmp);
    $menu .=$tmp;
}
if (isset($_SESSION['Admin']) && $_SESSION['Admin'] == 1 ){
    
foreach ($menuItemsAdmin as $key => $value) {
    $tmp = str_replace("_URL_", $key, $tplMenu);
    $tmp = str_replace("_Nome_", $value, $tmp);
    $menu .=$tmp;
}
    
}

$tplM = str_replace("_Menu_", $menu, $tplM);

?>
