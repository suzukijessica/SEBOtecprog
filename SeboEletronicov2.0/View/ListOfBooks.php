<?php

/*
  File name: ListOfBooks.php
  File description: data view to list the books
 */

include '../Controller/BookController.php';
$userId = $_REQUEST['livros'];

$listOfBooks = BookController::getBookById($userId);
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



        <table class='insr'>

            <tr>
                <th class='titlein' > <h5>Dados da Pesquisa de Livro</h5></th>
    </tr>

    <tr> 
        <td>
            <h2> Título: </h2> 
            <h6>
                <?php echo $listOfBooks['titulo_livro'] ?>
            </h6>
        </td>
    </tr>

    <tr>
        <td > 
            <h2> Autor:</h2>
            <h6>
                <?php echo $listOfBooks['autor'] ?>
            </h6>
        </td>
    </tr>

    <tr> 
        <td>
            <h2> Editora: </h2>
            <h6>
                <?php echo $listOfBooks['editora'] ?>
            </h6>
        </td>
    </tr>

    <tr>              
        <td>
            <h2> Edição:</h2> 
            <h6>
                <?php echo $listOfBooks['edicao'] ?>
            </h6>
        </td>    
    </tr>

    <tr>              
        <td>
            <h2> Descrição: </h2>
            <h6>
                <?php echo $listOfBooks['descricao_livro'] ?>
            </h6>
        </td>    
    </tr>

    <tr>              
        <td>
            <h2> Tipo(s) de operação: </h2>
            <h6>
                <?php echo $listOfBooks['venda'] ?>
                <?php echo $listOfBooks['troca'] ?>
            </h6>
        </td>    
    </tr>

    <tr>
        <td>
            <h2> Classificação: </h2>
            <h6>
                <?php echo $listOfBooks['genero'] ?>
            </h6>
        </td>
    </tr>

    <tr>              
        <td>
            <h2> Estado:<h2/> 
                <h6>
                    <?php echo $listOfBooks['estado_conserv'] ?>
                </h6>
        </td>    
    </tr>

    <tr>              
        <td>
            <a href="http://localhost/SEBOtecprog/SeboEletronicov2.0/View/ChangeBook.php?id=<?php echo $userId ?> " title="Alterar Livro"> <img src="img/icone_lapis.png" align="left"> </a>
            <a href=" " title="Excluir Livro"> <img src="img/icone_lixeira.png" align="right" > </a>
        </td>    
    </tr>


</table>    




</body>


</html>
</body>
