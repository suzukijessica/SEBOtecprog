<?php

/*
  File name: SearchUser.php
  File description: page to search users
 */

?>

<html>
    <head>	
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://localhost/SEBOtecprog/SeboEletronicov2.0/View/css/UsuarioStyle.css" type="text/css" media="all">
        <link rel="stylesheet" href="http://localhost/SEBOtecprog/SeboEletronicov2.0/View/css/main.css" type="text/css" media="all">
        <link rel="shortcut icon" href="http://localhost/SEBOtecprog/SeboEletronicov2.0/View/img/android.ico">
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
                    <th class='titlein' > <h5>Pesquisar Usuário</h5></th>
                </tr>

                <tr>
                    <td > 
                        <h4> Nome: <input type="text" name="nome"/></h4>
                    </td>
                </tr>

                <th>
                    <input type="hidden" name="tipo" value="pesquisar"/>
                    <input type="submit" name='Enviar' value="Pesquisar" />
                </th>

            </table>    

        </form>


    </body>


</html>



