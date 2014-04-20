<?php
/*
  File name: usuarioPesquisado.php
  File description: data view to find searched user
 */

session_start();
$idUser = $_SESSION['id_usuario'];
include '../Controle/UsuarioControlador.php';
$username = $_REQUEST['nome'];
$searchUser = UsuarioControlador::pesquisaUsuario($username);
?>

<!DOCTYPE HTML>
<html>
    <head>	
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/css/UsuarioStyle.css" type="text/css" media="all">
        <link rel="stylesheet" href="http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/css/main.css" type="text/css" media="all">
        <link rel="shortcut icon" href="http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/img/android.ico">
        <script src="http://localhost/SEBOtecprog/SeboEletronicov2.0/Utilidades/Redireciona.js"></script> 
        <title>Sebo Eletrônico</title>

    </head>
    <body>
        <div id="header">
            <div id="logo"><img src="http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/img/sebo_header.png" class="imgHeader"/></div>
        </div>

        <div id="mainmenu">
            <button class="button" onclick="home()">Home</button>
            <button class="button" onclick="user();">Usuário</button>       
            <button class="button" onclick="livro();">Livro</button>
            <button class="button" onclick="sair();">Sair</button>

        </div>
        <div id="mainmenu">

            <button class="button" onclick="altera();">Alterar</button>       
            <button class="button" onclick="deleta();">Deletar</button> 
            <button class="button" onclick="pesquisa();">Pesquisar</button>


        </div>

        <br/>
        <br/>
        <br/>

        <table class='insr'>

            <tr>
                <th class='titlein' > <h5>Usuário Pesquisado</h5></th>
    </tr>

    <tr>
        <td > 
    <center> Nome: <?php echo $searchUser[1]; ?></center> 
</td>
</tr>

<tr>
    <td > 
<center> Telefone :<?php echo $searchUser[3]; ?></center> 
</td>
</tr>

<tr>
    <td > 
<center>  Email: <?php echo $searchUser[4]; ?></center>
</td>
</tr>
</table>    


</body>


</html>



