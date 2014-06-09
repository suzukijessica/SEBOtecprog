<?php

/*
  File name: BookDao.php
  File description: insert, select, update, delete Livros
 */

include "../Utilities/ConnectionDataBase.php";

class BookDao {

    public function savesBookDao($book, $idOwner) {
        // Inserts Book in Database

        $sqlCommand = "INSERT INTO livro (id_dono, titulo_livro, editora, autor, edicao, genero, estado_conserv, descricao_livro, venda, troca)
            VALUES ('" . $idOwner . "','" . $book->getTitle() . "','" . $book->getEditora() . "','" . $book->getAutor() . "',
                '" . $book->getEdicao() . "','" . $book->getGenero() . "','" . $book->getEstado() . "','" . $book->getDescricao() . "','" . $book->getVenda() . "',
                    '" . $book->getTroca() . "')";
        $book = mysql_query($sqlCommand);
        return $book;
    }

    public function searchesBookDao($bookTitle, $newBookState, $usedBookState, $availabilityBookSelling, $availabilityBookExchanging) {
        // Selects Book in Database

        if (empty($availabilityBookExchanging) && !empty($availabilityBookSelling)) {
            $sqlCommand = validatesBookSelling($bookTitle, $newBookState, $usedBookState, $availabilityBookSelling);
            
        } else if (!empty($availabilityBookExchanging) && empty($availabilityBookSelling)) {
            $sqlCommand = validatesBookExchanging($bookTitle, $newBookState, $usedBookState, $availabilityBookExchanging);
            
        } else {
            $sqlCommand = "SELECT * FROM livro WHERE titulo_livro = '" . $bookTitle . "'";
        }

        $queryList = mysql_query($sqlCommand);
        $lineQueryBookList = mysql_fetch_array($queryList);

        if (!(empty($lineQueryBookList))) {
            return false;
        } else {
            //nothing to do - proceed to the next step function
            
        }
        
        return $lineQueryBookList;
        
    }

   public function validatesBookSelling($bookTitle, $newBookState, $usedBookState, $availabilityBookSelling){
       
        if (empty($newBookState) && !empty($usedBookState)) {
                $testSqlCommand = "SELECT * FROM livro WHERE titulo_livro = '" . $bookTitle . "' AND estado_conserv = '" . $usedBookState . "' 
            AND tipo_operacao = '" . $availabilityBookSelling . "'";
        } elseif (!empty($newBookState) && empty($usedBookState)) {
               $testSqlCommand = "SELECT * FROM livro WHERE titulo_livro = '" . $bookTitle . "' AND estado_conserv = '" . $newBookState . "' 
            AND tipo_operacao = '" . $availabilityBookSelling . "'";
        }
            
        return $testSqlCommand;
        
    }
    
    public function validatesBookExchanging($sqlCommand, $bookTitle, $newBookState, $usedBookState, $availabilityBookExchanging){
        
        if (empty($newBookState) && !empty($usedBookState)) {
                $testSqlCommand = "SELECT * FROM livro WHERE titulo_livro = '" . $bookTitle . "' AND estado_conserv = '" . $usedBookState . "' 
            AND tipo_operacao = '" . $availabilityBookExchanging . "'";
        } elseif (!empty($newBookState) && empty($usedBookState)) {
                $testSqlCommand = "SELECT * FROM livro WHERE titulo_livro = '" . $bookTitle . "' AND estado_conserv = '" . $usedBookState . "' 
            AND tipo_operacao = '" . $availabilityBookExchanging . "'";
        }
        
        return $testSqlCommand;
    }
    
    public function getBookByIdDao($idBook) {
        $sqlCommand = "SELECT * FROM livro WHERE id_livro = '" . $idBook . "'";
        $queryResult = mysql_query($sqlCommand);
        return mysql_fetch_array($queryResult);
    }

    public function deletesBookDao($idBook) {
        // Delete Book of Database

        $sqlCommand = "DELETE FROM livro WHERE id_livro = '" . $idBook . "'";
        $bookDeleted = mysql_query($sqlCommand);
        return $bookDeleted;
    }

    public function changesBookDao($book, $idOwner, $idUser) {
        // Update book parameters in Database	

        $sqlCommand = "UPDATE livro SET id_dono = '" . $idUser . "', titulo_livro = '" . $book->getTitle() . "', editora = '" . $book->getEditora() . "', 
            autor = '" . $book->getAutor() . "', edicao = '" . $book->getEdicao() . "', genero = '" . $book->getGenero() . "', estado_conserv = '" . $book->getEstado() . "', 
                descricao_livro = '" . $book->getDescricao() . "', venda = '" . $book->getVenda() . "', troca = '" . $book->getTroca() . "' WHERE id_livro = '" . $idOwner . "'";
        $book = mysql_query($sqlCommand);

        return $book;
    }

    public function getBookByIdUserDao($idUser) {

        $sqlCommand = "SELECT * FROM livro WHERE id_dono = '" . $idUser . "'";
        $queryResult = mysql_query($sqlCommand);

        $booksArray = array();

        while ($recordQuery = mysql_fetch_assoc($queryResult)) {
            $booksArray[] = $recordQuery;
        }

           $bool = validatesBookArray($booksArray);
           
        return $booksArray;
    }
    
    public function validatesBookArray($booksArray){
        
        if (!(empty($booksArray))) {
            return false;
        } else{
            return true;
        }
        
        return true;
 
    }

    public function getAllBookDao() {
        $sqlCommand = "SELECT * FROM livro";
        $queryResult = mysql_query($sqlCommand);

        $booksArray = array();

        while ($recordQuery = mysql_fetch_assoc($queryResult)) {
            $$booksArray[] = $recordQuery;
        }

        if (count($booksArray) == 0) {
            return false;
        } else{
            //nothing to do - proceed to the next step function
        }

        return $booksArray;
    }

}
?>