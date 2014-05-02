<?php

/*
  File name: LivroControlador.php
  File description: insert, select, update, delete Livros calling methods of class LivroDao.
 */

include '../Model/BookModel.php';

class BookController {

    public function savesBook($bookTitle , $bookAuthor , $bookGenre, $bookEdition, $bookPublishing, $bookSelling,
            $bookExchanging, $bookState, $bookDescription, $idBookOwner) {
        // Insert Livro in Database calling method "salvaLivro" of class LivroDao

        if (empty($bookSelling) && empty($bookExchanging)) {
            $bookSelling = "venda";
            $bookExchanging = "troca";
        } else{
            //nothing to do - proceed to the next step function
            
        }

        try {
            $book = new Livro($bookTitle , $bookAuthor , $bookGenre, $bookEdition, $bookPublishing, $bookSelling,
            $bookExchanging, $bookState, $bookDescription);
        } catch (Exception $exception_control_book) {
            print"<script>alert('" . $exception_control_book->getMessage() . "')</script>";
            echo "<script>window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/View/RegisterBook.php';</script>";
            exit;
            
        }
        return BookDao::savesBookDao($book, $idBookOwner);
    }

    public function searchesBook($bookTitle, $newBookState, $usedBookState, $availabilityBookSelling, $availabilityBookExchanging) {
        // Selects Livro in Database calling method "pesquisaLivro" of class LivroDaoo   
        return BookDao:: searchesBookDao($bookTitle, $newBookState, $usedBookState, $availabilityBookSelling, $availabilityBookExchanging);
    }

    public function getBookById($idBook) {
        return BookDao::getBookByIdDao($idBook);
    }

    public function deletesBook($idBook) {
        // Delete Livro in Database calling method "deletaLivro" of class LivroDao 
        return BookDao::deletesBookDao($idBook);
    }

    public function changesBook($bookTitle , $bookAuthor , $bookGenre, $bookEdition, $bookPublishing, $bookSelling,
            $bookExchanging, $bookState, $bookDescription, $idBookOwner, $idUser) {
        // Update book parameters in Database calling method "alteraLivro" of class LivroDao    
        if (empty($bookSelling) && empty($bookExchanging)) {
            $bookSelling = "venda";
            $bookExchanging = "troca";
        } else {
            //nothing to do - proceed to the next step function
            
        }

        try {
            $book = new Livro($bookTitle , $bookAuthor , $bookGenre, $bookEdition, $bookPublishing, $bookSelling,
            $bookExchanging, $bookState, $bookDescription);
            
        } catch (Exception $exception_control_book) {
            print"<script>alert('" . $exception_control_book->getMessage() . "')</script>";
            echo "<script>window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/View/RegisterBook.php';</script>";
            exit;
        }
        return BookDao::changesBookDao($book, $idBookOwner, $idUser);
    }

    public function getBookByIdUser($idUser) {
        return BookDao::getBookByIdUserDao($idUser);
    }

    public function getAllBook() {
        return BookDao::getAllBookDao();
    }

}

?>
