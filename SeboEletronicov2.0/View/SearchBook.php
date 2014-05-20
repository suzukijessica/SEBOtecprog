<?php

/*
  File name: SearchBook.php
  File description: page to search books
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

            <button class="button" onclick="meusLivros();">Meus Livros</button>
            <button class="button" onclick="livrosDisponiveis();">Livros Disponiveis</button>
            <button class="button" onclick="cadastraLivro();">Cadastrar</button>
            <button class="button" onclick="pesquisaLivro();">Pesquisar</button>


        </div>

        <br/>
        <br/>
        <br/>

        <form  name="Insere Dados" action="http://localhost/SEBOtecprog/SeboEletronicov2.0/Utilities/ReceiveBookForm.php" method="post" class="formu">

            <table class='insr'>

                <tr>
                    <th class='titlein' > <h5>Pesquisar Livro</h5></th>
                </tr>

                <tr>
                    <td > 
                        <h4> Título: <input type="text" name="titulo" required/></h4>
                    </td>
                </tr>

                <tr>              
                    <td>
                        <h4> Estado:</h4> 
                        <h3>
                            <input type="checkbox" name="novo" value="novo"/>Novo
                            <input type="checkbox" name="usado" value="usado"/>    Usado<br/>
                            <h3/>

                    </td>    
                </tr>

                <tr>              
                    <td>
                        <h4> Classificação:</h4> 
                        <h3>
                            <input type="checkbox" name="venda" value="venda"/>Venda
                            <input type="checkbox" name="troca" value="troca"/>    Troca<br/>
                            <h3/>

                    </td>    
                </tr>

                <th>
                    <input type="hidden" name="tipo" value="pesquisaLivro"/>
                    <input type="submit" name='Enviar' value="Pesquisar" title='Pesquisar Livro' />
                </th>

            </table>    

        </form>


    </body>


</html>



