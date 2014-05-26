<?php

include 'utnoticias.php';
$id = (isset($_GET['ID_Noticias']) ? $_GET['ID_Noticias'] : null);
$usuario = new Usuarios();
$dados = $usuario->selecionaUsuario($id);
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
       
    </head>
    <body>
        <h1> Insira a noticia </h1>
        <form id="form" name="form" action="savenoti.php" method="post" >
            <label> Titulo Noticia: </label>
            <input type="text" id="Titulo_Noticia" name="Titulo_Noticia" value="<?php echo (!empty($dados['Titulo_Noticia']) ? $dados['Titulo_Noticia'] : ''); ?>" /> <br />
            <label> Resumo: </label>
            <input type="text" id="Resumo" name="Resumo" value="<?php echo (!empty($dados['Resumo']) ? $dados['Resumo'] : ''); ?>" /> <br />
            
            <label> Noticia: </label>
            <input type="text" id="Noticia" name="Noticia" value="<?php echo (!empty($dados['Noticia']) ? $dados['Noticia'] : ''); ?>" /> <br />
            <label> Autor: </label>
            <input type="text" id="Autor" name="Autor" value="<?php echo (!empty($dados['Autor']) ? $dados['Autor'] : ''); ?>" /> <br />
            <label> Data: </label>
            <input type="date" id="Data" name="Data" value="" /> <br />
            
            <input type="hidden" id="id" name="id" value="<?php echo (!empty($dados['id']) ? $dados['id'] : ''); ?>" />
            <input type="submit" value="Salvar" />
        </form>
        <?php $registros = $usuario->selecionaUsuarios(); ?>
        <table width="600" border="1">
            <tr>
                <th align="left"> Titulo Noticia </th>
                <th align="left"> Resumo </th>
                <th align="left"> Noticia </th>
                <th align="left"> Autor </th>
                <th align="left"> Data </th>
            </tr>
            <?php foreach($registros as $registro): ?>
                <tr>
                    <td align="left"> <?php echo $registro['Titulo_Noticia']; ?> </td>
                    <td align="left"> <?php echo $registro['Resumo']; ?> </td>
                    <td align="left"> <?php echo $registro['Noticia']; ?> </td>
                     <td align="left"> <?php echo $registro['Autor']; ?> </td>
                    <td align="left"> <?php echo $registro['Data']; ?> </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>






