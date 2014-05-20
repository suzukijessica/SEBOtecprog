<?php
/*
  File name: ReceiveBookForm.php
  File description: gets selected form to register, change, search or delete book
 */

include_once '../Controller/BookController.php';
//require_once '';

switch ($_POST['tipo']) {
//switch action selection to be held in the register book, register, change, or delete search     

    case "cadastraLivro":
        $bookTitle = $_POST['titulo'];
        $bookAuthor = $_POST['autor'];
        $bookPublisher = $_POST['editora'];
        $bookEdition = $_POST['edicao'];
        $bookForSale = $_POST['venda'];
        $bookForExchange = $_POST['troca'];
        $bookGender = $_POST['genero'];
        $bookCondition = $_POST['estado'];
        $bookDescription = $_POST['descricao'];
        $idBookOwner = $_POST['id_dono'];


        $saved = BookController::savesBook($bookTitle, $bookAuthor, $bookGender, $bookEdition, $bookPublisher, $bookForSale, $bookForExchange, $bookCondition, $bookDescription, $idBookOwner);


        if (!empty($saved)) {
            echo "<script>altert('Livro cadastrado com sucesso!')</script>";
        } else {
            echo "<script>('Falha ao cadastrar o livro, tente novamente.')</script>";
        }

        echo "<script>window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/View/indexLivro.php';</script>";

        break;

    case "alterarLivro":
        $bookTitle = $_POST['titulo'];
        $bookAuthor = $_POST['autor'];
        $bookPublisher = $_POST['editora'];
        $bookEdition = $_POST['edicao'];
        $bookForSale = $_POST['venda'];
        $bookForExchange = $_POST['troca'];
        $bookGender = $_POST['genero'];
        $bookCondition = $_POST['estado'];
        $bookDescription = $_POST['descricao'];
        $idBookOwner = $_POST['id_dono'];
        $userId = $_POST['id'];

        BookController::changesBook($bookTitle, $bookAuthor, $bookGender, $bookEdition, $bookPublisher, $bookForSale, $bookForExchange, $bookCondition, $bookDescription, $userId, $idBookOwner);
        ?>
        <script language="Javascript" type="text/javascript">
            alert("Livro alterado com sucesso!!");
        </script>  

        <script language = "Javascript">
            window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/IndexBook.php";
        </script><?php
        break;

    case "pesquisaLivro":
        $bookTitle = $_POST['titulo'];
        $newBookState = $_POST['novo'];
        $usedBookState = $_POST['usado'];
        $availabilityBookSelling = $_POST['venda'];
        $availabilityBookExchanging = $_POST['troca'];

        $listOfBooks = BookController::searchesBook($bookTitle, $newBookState, $usedBookState, $availabilityBookSelling, $availabilityBookExchanging);
        $idBook = $listOfBooks['id_livro'];
        ?>
        <script language = "Javascript">
            window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/ListOfBooks.php?livros=<?php echo $idBook ?>";
        </script><?php
        break;
}

if ($_REQUEST['id_livro']) {
    $idBook = $_REQUEST['id_livro'];
    BookController::deletesBook($idBook);
    ?>
    <script language="Javascript" type="text/javascript">
        alert("Livro excluido com sucesso!!");
    </script>

    <script language = "Javascript">
        window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/View/IndexBook.php";
    </script><?php
}
?>
