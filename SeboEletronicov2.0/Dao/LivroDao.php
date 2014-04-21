<?php

/*
  File name: LivroDao.php
  File description: insert, select, update, delete Livros.
  Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
 */

include "../Utilidades/ConexaoComBanco.php";

class LivroDao {

    public function salvaLivro($book, $id_owner) {
        // Inserts Livro in Database

        $sql_command = "INSERT INTO livro (id_dono, titulo_livro, editora, autor, edicao, genero, estado_conserv, descricao_livro, venda, troca)
            VALUES ('" . $id_owner . "','" . $book->getTitulo() . "','" . $book->getEditora() . "','" . $book->getAutor() . "',
                '" . $book->getEdicao() . "','" . $book->getGenero() . "','" . $book->getEstado() . "','" . $book->getDescricao() . "','" . $book->getVenda() . "',
                    '" . $book->getTroca() . "')";
        $book = mysql_query($sql_command);
        return $book;
    }

    public function pesquisaLivro($book_title, $new_book_state, $used_book_state, $availability_book_selling, $availability_book_exchanging) {
        // Selects Livro in Database

        if (empty($availability_book_exchanging) && !empty($availability_book_selling)) {
            if (empty($new_book_state) && !empty($used_book_state)) {
                $sql_command = "SELECT * FROM livro WHERE titulo_livro = '" . $book_title . "' AND estado_conserv = '" . $used_book_state . "' 
            AND tipo_operacao = '" . $availability_book_selling . "'";
            } elseif (!empty($new_book_state) && empty($used_book_state)) {
               $sql_command = "SELECT * FROM livro WHERE titulo_livro = '" . $book_title . "' AND estado_conserv = '" . $new_book_state . "' 
            AND tipo_operacao = '" . $availability_book_selling . "'";
            }
        } else if (!empty($availability_book_exchanging) && empty($availability_book_selling)) {
            if (empty($new_book_state) && !empty($used_book_state)) {
                $sql_command = "SELECT * FROM livro WHERE titulo_livro = '" . $book_title . "' AND estado_conserv = '" . $used_book_state . "' 
            AND tipo_operacao = '" . $availability_book_exchanging . "'";
            } elseif (!empty($new_book_state) && empty($used_book_state)) {
                $sql_command = "SELECT * FROM livro WHERE titulo_livro = '" . $book_title . "' AND estado_conserv = '" . $used_book_state . "' 
            AND tipo_operacao = '" . $availability_book_exchanging . "'";
            }
        } else {
            $sql = "SELECT * FROM livro WHERE titulo_livro = '" . $book_title . "'";
        }

        $query_list = mysql_query($sql_command);
        $line_query_book_list = mysql_fetch_array($query_list);

        if (!(empty($line_query_book_list))) {
            return false;
        } else {
            //nothing to do - proceed to the next step function
            
        }
        
        return $line_query_book_list;
        
    }

    public function getLivroById($id_book) {
        $sql_command = "SELECT * FROM livro WHERE id_livro = '" . $id_book . "'";
        $query_result = mysql_query($sql_command);
        return mysql_fetch_array($query_result);
    }

    public function deletaLivro($id_book) {
        // Delete Book of Database

        $sql_command = "DELETE FROM livro WHERE id_livro = '" . $id_book . "'";
        $book_deleted = mysql_query($sql_command);
        return $book_deleted;
    }

    public function alteraLivro($book, $id_owner, $id_user) {
        // Update book parameters in Database	

        $sql_command = "UPDATE livro SET id_dono = '" . $id_user . "', titulo_livro = '" . $book->getTitulo() . "', editora = '" . $book->getEditora() . "', 
            autor = '" . $book->getAutor() . "', edicao = '" . $book->getEdicao() . "', genero = '" . $book->getGenero() . "', estado_conserv = '" . $book->getEstado() . "', 
                descricao_livro = '" . $book->getDescricao() . "', venda = '" . $book->getVenda() . "', troca = '" . $book->getTroca() . "' WHERE id_livro = '" . $id_owner . "'";
        $book = mysql_query($sql_command);

        return $book;
    }

    public function getLivroByIdUsuario($id_user) {

        $sql_command = "SELECT * FROM livro WHERE id_dono = '" . $id_user . "'";
        $query_result = mysql_query($sql_command);

        $books_array = array();

        while ($record_query = mysql_fetch_assoc($query_result)) {
            $books_array[] = $record_query;
        }

        if (!(empty($books_array))) {
            return false;
        } else{
            //nothing to do - proceed to the next step function
        }

        return $books_array;
    }

    public function getAllLivro() {
        $sql_command = "SELECT * FROM livro";
        $query_result = mysql_query($sql_command);

        $books_array = array();

        while ($record_query = mysql_fetch_assoc($query_result)) {
            $$books_array[] = $record_query;
        }

        if (count($books_array) == 0) {
            return false;
        } else{
            //nothing to do - proceed to the next step function
        }

        return $books_array;
    }

}
?>