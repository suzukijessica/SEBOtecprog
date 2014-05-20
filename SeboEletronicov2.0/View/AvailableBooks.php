<?php

/*
  File name: AvailableBooks.php
  File description: data view to list the available books
 */

session_start();
include '../Controller/BookController.php';
$userId = $_SESSION['id_usuario'];

$listOfBooks = BookController::getAllBook();
?>

<html>
    <head>	
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://localhost/SEBOtecprog/SeboEletronicov2.0/View/css/MeusLivrosStyle.css" type="text/css" media="all">
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
        <!-- tr = linha
             td = coluna-->
        <table class='insr'>

            <tr>
                <th class='titlein' > <h5>Livros Disponíveis</h5></th>
    </tr>
    <?php foreach ($listOfBooks as $chave => $valor) {
        ?>              
        <tr> 
            <td>
                <h2> Título: </h2> 
                <h6>
                    <a href="http://localhost/SEBOtecprog/SeboEletronicov2.0/View/BookDetails.php?id_livro=<?php echo $valor['id_livro'] ?>"> <?php echo $valor['titulo_livro'] ?></a>
                </h6>
            </td>
        </tr>
    <?php } ?>         

</table>    




</body>


</html>
</body>
