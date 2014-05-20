<?php

/*
  File name: indexLogin.php
  File description: page initial of login
 */

session_start();

if (!isset($_SESSION["email"]) || !isset($_SESSION["senha"])) {
    header("Location: entrarLogin.php");
    exit;
    
} else {
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

            <br><br><div align="center"><font size="+3"  color ="white">Seja Bem Vindo ao Sebo Eletronico!</font><br />
            </div>

            <img src="http://localhost/SEBOtecprog/SeboEletronicov2.0/View/img/Login.png" class="img3"/>

        </body>


    </html>
    <?php
}?>