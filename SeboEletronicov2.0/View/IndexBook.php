<?php

/*
  File name: indexBook.php
  File description: page initial of books
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
        <img src="http://localhost/SEBOtecprog/SeboEletronicov2.0/View/img/livroLivro.png" class="img2"/>
    </body>


</html>