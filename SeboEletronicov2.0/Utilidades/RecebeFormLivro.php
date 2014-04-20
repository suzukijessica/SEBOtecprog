<?php
/*
  File name: RecebeFormLivro.php
  File description: gets selected form to register, change, search or delete book
  Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
 */

include_once '../Controle/LivroControlador.php';
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
        $id_book_owner = $_POST['id_dono'];


        $salvo = LivroControlador::salvaLivro($bookTitle, $bookAuthor, $bookGender, $bookEdition, $bookPublisher, $bookForSale, $bookForExchange, $bookCondition, $bookDescription, $id_book_owner);


        if (!empty($salvo)) {
            echo "<script>altert('Livro cadastrado com sucesso!')</script>";
        } else {
            echo "<script>('Falha ao cadastrar o livro, tente novamente.')</script>";
        }

        echo "<script>window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/indexLivro.php';</script>";

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
        $id_book_owner = $_POST['id_dono'];
        $userId = $_POST['id'];

        LivroControlador::alteraLivro($bookTitle, $bookAuthor, $bookGender, $bookEdition, $bookPublisher, $bookForSale, $bookForExchange, $bookCondition, $bookDescription, $userId, $id_book_owner);
        ?>
        <script language="Javascript" type="text/javascript">
            alert("Livro alterado com sucesso!!");
        </script>  

        <script language = "Javascript">
            window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/indexLivro.php";
        </script><?php
        break;

    case "pesquisaLivro":
        $bookTitle = $_POST['titulo'];
        $estadoNovo = $_POST['novo'];
        $estadoUsado = $_POST['usado'];
        $disponibilidadeVenda = $_POST['venda'];
        $disponibilidadeTroca = $_POST['troca'];

        $listOfBooks = LivroControlador::pesquisaLivro($bookTitle, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca);
        $idBook = $listOfBooks['id_livro'];
        ?>
        <script language = "Javascript">
            window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/listaDeLivros.php?livros=<?php echo $idBook ?>";
        </script><?php
        break;
}

if ($_REQUEST['id_livro']) {
    $idBook = $_REQUEST['id_livro'];
    LivroControlador::deletaLivro($idBook);
    ?>
    <script language="Javascript" type="text/javascript">
        alert("Livro excluido com sucesso!!");
    </script>

    <script language = "Javascript">
        window.location = "http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/indexLivro.php";
    </script><?php
}
?>
