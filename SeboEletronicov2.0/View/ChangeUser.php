<?php

/*
  File name: ChangeUser.php
  File description: data view to change the user
 */

session_start();
$idUser = $_SESSION['id_usuario'];
$finalPassword = $_SESSION['senha'];

include '../Controller/UserController.php';

$register = UserController::checksCadastreById($idUser);
?>
<!DOCTYPE HTML>
<html>
    <head>	
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://localhost/SEBOtecprog/SeboEletronicov2.0/View/css/UsuarioStyle.css" type="text/css" media="all">
        <link rel="stylesheet" href="http://localhost/SEBOtecprog/SeboEletronicov2.0/View/css/main.css" type="text/css" media="all">
        <link el="shortcut icon" href="http://localhost/SEBOtecprog/SeboEletronicov2.0/View/img/android.ico">
        <script src="http://localhost/SEBOtecprog/SeboEletronicov2.0/Utilities/Redirect.js"></script> 
        <title>Sebo Eletrônico</title>

    </head>
    <body>
        <div id="header">
            <div id="logo"><img src="http://localhost/SEBOtecprog/SeboEletronicov2.0/View/img/sebo_header.png" class="imgHeader"/></div>
        </div>

        <div id="mainmenu">
            <button class="button" onclick="home()">Home</button>
            <button class="button" onclick="user();">Usuário</button>       
            <button class="button" onclick="livro();">Livro</button>
            <button class="button" onclick="sair();">Sair</button>

        </div>

    </div>
    <div id="mainmenu">

        <button class="button" onclick="altera();">Alterar</button>       
        <button class="button" onclick="deleta();">Deletar</button> 
        <button class="button" onclick="pesquisa();">Pesquisar</button>

    </div>

    <br/>
    <br/>
    <br/>


    <form  name="Insere Dados" action="http://localhost/SEBOtecprog/SeboEletronicov2.0/Utilities/ReceiveForm.php" method="post" class="formu">

        <table class='insr'>

            <tr>
                <th class='titlein' > <h5>Alterar Cadastro</h5></th>
            </tr>

            <tr> 
                <td>
                    <h2> Nome: <input type="text" name="nome" value="<?php echo $register ['nome_usuario'] ?>"/></h2> 
                </td>
            </tr>

            <tr>
                <td > 
                    <h4> E-mail: <input type="text" name="email" value="<?php echo $register['email_usuario'] ?>"/></h4>
                </td>
            </tr>

            <tr> 
                <td>
                    <h6> Telefone: <input type="text" name="telefone" value="<?php echo $register['telefone_usuario'] ?>"/></h6> 
                </td>
            </tr>

            <tr>              
                <td>
                    <h4> Senha: <input type="password" name="senha[]" value="<?php echo $finalPassword ?>"/></h4> <p>
                </td>    
            </tr>

            <tr>              
                <td>
                    <h3> Confirmar Senha: <input type="password" name="senha[]" value="<?php echo $finalPassword ?>"/></h3> <p>
                </td>    
            </tr>

            <th>
                <input type="hidden" name="tipo" value="alterar"/>
                <input type="hidden" name="senhaAntiga" value="<?php echo $finalPassword['codigo_senha'] ?>"/>
                <input type="hidden" name="id_pessoa" value="<?php echo $idUser ?>" />
                <input type="submit" name='Enviar' value="ENVIAR" title='Enviar dados' />
                <input type="reset" name='Limpar' value="LIMPAR DADOS" title='Limpar dados' /> 
            </th>

        </table>    

    </form>


</body>


</html>