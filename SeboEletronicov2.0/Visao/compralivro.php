<?php
/*
  File name: compralivro.php
  File description: data view to buy the book
 */

session_start();
$idUser = $_SESSION['id_usuario'];
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

            <button class="button" onclick="home();">Home</button>
            <button class="button" onclick="user();">Usuário</button>
            <button class="button" onclick="livro();">Livro</button>
            <button class="button" onclick="login();">Login</button>

        </div>

        <h1> Compra feita com Sucesso </h1>


        <?php
        include "..\Utilidades\ConexaoComBanco.php";
        if (!$dataBase)
            die("<h1>Falha no bd </h1>");

        $phoneBuyer = $_POST ['tel_comprador'];
        $nameBuyer = $_POST['nome_comprador'];
        $idBook = $_POST['id_livro'];
        $id_book_owner = $_POST['id_dono'];



//Dados Vendedor
        $stringSQL = "SELECT * FROM usuario WHERE id_usuario = '$id_book_owner' ";

        $result = mysql_query($stringSQL);

        while ($row = mysql_fetch_array($result)) {

            $emailSeller = $row['email_usuario'] . "<br />";
        }





        include '../Modelo/Usuario.php';

        include "..\Utilidades\ConexaoComBanco.php";
        if (!$dataBase)
            die("<h1>Falha no bd </h1>");

        $strSQL5 = "UPDATE livro SET operacao = 'V' WHERE id_livro = $idBook ";
        $rs5 = mysql_query($strSQL5);
        ?>


    </body>


</html>