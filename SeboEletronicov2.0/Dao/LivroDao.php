<?php

/*
  File name: LivroDao.php
  File description: insert, select, update, delete Livros.
  Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
 */

include "../Utilidades/ConexaoComBanco.php";

class LivroDao {

    public function salvaLivro($livro, $id_dono) {
        // Inserts Livro in Database

        $sql = "INSERT INTO livro (id_dono, titulo_livro, editora, autor, edicao, genero, estado_conserv, descricao_livro, venda, troca)
            VALUES ('" . $id_dono . "','" . $livro->getTitulo() . "','" . $livro->getEditora() . "','" . $livro->getAutor() . "',
                '" . $livro->getEdicao() . "','" . $livro->getGenero() . "','" . $livro->getEstado() . "','" . $livro->getDescricao() . "','" . $livro->getVenda() . "',
                    '" . $livro->getTroca() . "')";
        $livro = mysql_query($sql);
        return $livro;
    }

    public function pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca) {
        // Selects Livro in Database

        if (empty($disponibilidadeTroca) && !empty($disponibilidadeVenda)) {
            if (empty($estadoNovo) && !empty($estadoUsado)) {
                $sql = "SELECT * FROM livro WHERE titulo_livro = '" . $titulo . "' AND estado_conserv = '" . $estadoUsado . "' 
            AND tipo_operacao = '" . $disponibilidadeVenda . "'";
            } elseif (!empty($estadoNovo) && empty($estadoUsado)) {
                $sql = "SELECT * FROM livro WHERE titulo_livro = '" . $titulo . "' AND estado_conserv = '" . $estadoNovo . "' 
            AND tipo_operacao = '" . $disponibilidadeVenda . "'";
            }
        } else if (!empty($disponibilidadeTroca) && empty($disponibilidadeVenda)) {
            if (empty($estadoNovo) && !empty($estadoUsado)) {
                $sql = "SELECT * FROM livro WHERE titulo_livro = '" . $titulo . "' AND estado_conserv = '" . $estadoUsado . "' 
            AND tipo_operacao = '" . $disponibilidadeTroca . "'";
            } elseif (!empty($estadoNovo) && empty($estadoUsado)) {
                $sql = "SELECT * FROM livro WHERE titulo_livro = '" . $titulo . "' AND estado_conserv = '" . $estadoNovo . "' 
            AND tipo_operacao = '" . $disponibilidadeTroca . "'";
            }
        } else {
            $sql = "SELECT * FROM livro WHERE titulo_livro = '" . $titulo . "'";
        }

        $lista = mysql_query($sql);
        $listaLivros = mysql_fetch_array($lista);

        if (!(empty($listaLivros))) {
            return false;
        }

        return $listaLivros;
    }

    public function getLivroById($id) {
        $sql = "SELECT * FROM livro WHERE id_livro = '" . $id . "'";
        $result = mysql_query($sql);
        return mysql_fetch_array($result);
    }

    public function deletaLivro($id) {
        // Delete Book of Database

        $sql = "DELETE FROM livro WHERE id_livro = '" . $id . "'";
        $deletou = mysql_query($sql);
        return $deletou;
    }

    public function alteraLivro($livro, $id_dono, $id_usuario) {
        // Update book parameters in Database	

        $sql = "UPDATE livro SET id_dono = '" . $id_usuario . "', titulo_livro = '" . $livro->getTitulo() . "', editora = '" . $livro->getEditora() . "', 
            autor = '" . $livro->getAutor() . "', edicao = '" . $livro->getEdicao() . "', genero = '" . $livro->getGenero() . "', estado_conserv = '" . $livro->getEstado() . "', 
                descricao_livro = '" . $livro->getDescricao() . "', venda = '" . $livro->getVenda() . "', troca = '" . $livro->getTroca() . "' WHERE id_livro = '" . $id_dono . "'";
        $livro = mysql_query($sql);

        return $livro;
    }

    public function getLivroByIdUsuario($idUsuario) {

        $sql = "SELECT * FROM livro WHERE id_dono = '" . $idUsuario . "'";
        $result = mysql_query($sql);

        $livros = array();

        while ($registro = mysql_fetch_assoc($result)) {
            $livros[] = $registro;
        }

        if (!(empty($livros))) {
            return false;
        }

        return $livros;
    }

    public function getAllLivro() {
        $sql = "SELECT * FROM livro";
        $result = mysql_query($sql);

        $livros = array();

        while ($registro = mysql_fetch_assoc($result)) {
            $livros[] = $registro;
        }

        if (count($livros) == 0) {
            return false;
        }

        return $livros;
    }

}
?>

