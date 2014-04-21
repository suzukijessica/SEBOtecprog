<?php

/*
  File name: LivroControlador.php
  File description: insert, select, update, delete Livros calling methods of class LivroDao.
 */

include '../Modelo/Livro.php';

class LivroControlador {

    public function salvaLivro($book_title , $book_author , $book_genre, $book_edition, $book_publishing, $book_selling,
            $book_exchanging, $book_state, $book_description, $id_book_owner) {
        // Insert Livro in Database calling method "salvaLivro" of class LivroDao

        if (empty($book_selling) && empty($book_exchanging)) {
            $book_selling = "venda";
            $book_exchanging = "troca";
        } else{
            //nothing to do - proceed to the next step function
            
        }

        try {
            $book = new Livro($book_title , $book_author , $book_genre, $book_edition, $book_publishing, $book_selling,
            $book_exchanging, $book_state, $book_description);
        } catch (Exception $exception_control_book) {
            print"<script>alert('" . $exception_control_book->getMessage() . "')</script>";
            echo "<script>window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/cadastrarLivro.php';</script>";
            exit;
            
        }
        return LivroDao::salvaLivro($book, $id_book_owner);
    }

    public function pesquisaLivro($book_title, $new_book_state, $used_book_state, $availability_book_selling, $availability_book_exchanging) {
        // Selects Livro in Database calling method "pesquisaLivro" of class LivroDaoo   
        return LivroDao:: pesquisaLivro($book_title, $new_book_state, $used_book_state, $availability_book_selling, $availability_book_exchanging);
    }

    public function getLivroById($id_book) {
        return LivroDao::getLivroById($id_book);
    }

    public function deletaLivro($id_book) {
        // Delete Livro in Database calling method "deletaLivro" of class LivroDao 
        return LivroDao::deletaLivro($id_book);
    }

    public function alteraLivro($book_title , $book_author , $book_genre, $book_edition, $book_publishing, $book_selling,
            $book_exchanging, $book_state, $book_description, $id_book_owner, $id_user) {
        // Update book parameters in Database calling method "alteraLivro" of class LivroDao    
        if (empty($book_selling) && empty($book_exchanging)) {
            $book_selling = "venda";
            $book_exchanging = "troca";
        } else {
            //nothing to do - proceed to the next step function
            
        }

        try {
            $livro = new Livro($book_title , $book_author , $book_genre, $book_edition, $book_publishing, $book_selling,
            $book_exchanging, $book_state, $book_description);
            
        } catch (Exception $exception_control_book) {
            print"<script>alert('" . $exception_control_book->getMessage() . "')</script>";
            echo "<script>window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/cadastrarLivro.php';</script>";
            exit;
        }
        return LivroDao::alteraLivro($book, $id_book_owner, $id_user);
    }

    public function getLivroByIdUsuario($id_user) {
        return LivroDao::getLivroByIdUsuario($id_user);
    }

    public function getAllLivro() {
        return LivroDao::getAllLivro();
    }

}

?>
