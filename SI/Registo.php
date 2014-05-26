<?php
include 'utilizador.php';
$id = (isset($_GET['ID_Utilizadores']) ? $_GET['ID_Utilizadores'] : null);
$usuario = new Usuarios();
$dados = $usuario->selecionaUsuario($id);
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Bem Vindo, registe-se na nossa página.</title>
    </head>
    <body>
        <h1> Formulário Utilizador </h1>
        <form id="form" name="form" action="save.php" method="post" >
            <label> Username: </label>
            <input type="text" id="Username" name="Username" value="<?php echo (!empty($dados['Username']) ? $dados['Username'] : ''); ?>" /> <br />
            <label> Pass: </label>
            <input type="password" id="Pass" name="Pass" value="" /> <br />
            <label> Email: </label>
            <input type="text" id="Email" name="Email" value="<?php echo (!empty($dados['Email']) ? $dados['Email'] : ''); ?>" /> <br />
            <label> Nome: </label>
            <input type="text" id="Nome" name="Nome" value="<?php echo (!empty($dados['Nome']) ? $dados['Nome'] : ''); ?>" /> <br />
            <input type="hidden" id="id" name="id" value="<?php echo (!empty($dados['id']) ? $dados['id'] : ''); ?>" />
            <input type="submit" value="Salvar" />
        </form>
        <?php $registros = $usuario->selecionaUsuarios(); ?>
        <table width="600" border="1">
            <tr>
                <th align="left"> Username </th>
                <th align="left"> Email </th>
                <th align="left"> Nome </th>
            </tr>
            <?php foreach($registros as $registro): ?>
                <tr>
                    <td align="left"> <?php echo $registro['Username']; ?> </td>
                    <td align="left"> <?php echo $registro['Email']; ?> </td>
                    <td align="left"> <?php echo $registro['Nome']; ?> </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>
</html>





