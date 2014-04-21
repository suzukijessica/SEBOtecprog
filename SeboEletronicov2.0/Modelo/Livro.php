<?php

/*
  File name: Livro.php
  File description: model of book.
  Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
 */

include '../Dao/LivroDao.php';
include '../Utilidades/ValidaDados.php';
include '../Utilidades/ExcessaoNomeInvalido.php';
include '../Utilidades/ExcessaoTituloInvalido.php';
include '../Utilidades/ExcessaoEditoraInvalida.php';

class Livro {

    private $title;
    private $author;
    private $genero;
    private $edition;
    private $publisher;
    private $sale;
    private $swap;
    private $status;
    private $descricao;

    function __construct($title, $author, $genero, $edition, $publisher, $sale, $swap, $status, $descricao) {
        //Constructor method of class
        $this->setTitulo($title);
        $this->setAutor($author);
        $this->setGenero($genero);
        $this->setEdicao($edition);
        $this->setEditora($publisher);
        $this->setVenda($sale);
        $this->setTroca($swap);
        $this->setEstado($status);
        $this->setDescricao($descricao);
    }

    public function getTitulo() {
        //Method to access the instance of title attribute
        return $this->titulo;
    }

    public function setTitulo($title) {
        //Method to modify the instance of the title attribute
        if (!ValidaDados::validaCamposnulos($title)) {
            throw new ExcessaoTituloInvalido("Titulo nao pode ser nulo!");
        } else {
            $this->titulo = $title;
        }
    }

    public function getAutor() {
        //Method to access the instance of author attribute
        return $this->autor;
    }

    public function setAutor($author) {
        //Method to modify the instance of the author attribute
        if (!ValidaDados::validaCamposNulos($author)) {
            throw new ExcessaoNomeInvalido("O nome do Autor nao pode ser nulo!");
        } elseif (ValidaDados::validaNome($author) == 1) {
            throw new ExcessaoNomeInvalido("Nome do Autor contem caracteres invalidos!");
        } elseif (ValidaDados::validaNome($author) == 2) {
            throw new ExcessaoNomeInvalido("Nome do Autor contem espaços seguidos!");
        } else {
            $this->autor = $author;
        }
    }

    public function getGenero() {
        //Method to access the instance of gender attribute
        return $this->genero;
    }

    public function setGenero($genero) {
        //Method to modify the instance of the gender attribute
        $this->genero = $genero;
    }

    public function getTroca() {
        //Method to access the instance of switch attribute
        return $this->troca;
    }

    public function setTroca($swap) {
        //Method to modify the instance of switch attribute
        $this->troca = $swap;
    }

    public function getVenda() {
        //Method to access the instance of sale attribute
        return $this->venda;
    }

    public function setVenda($sale) {
        //Method to modify the instance of the sale attribute
        $this->venda = $sale;
    }

    public function getDescricao() {
        //Method to access the instance of description attribute
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        //Method to modify the instance of description attribute
        $this->descricao = $descricao;
    }

    public function defineTiposDeGeneros() {
        //Method to define type of gender
        define("ENGENHARIA", "Engenharia", TRUE);
        define("SOFTWARE", "Engenharia de Software", TRUE);
        define("ELETRONICA", "Engenharia Eletronica", TRUE);
        define("ENERGIA", "Engenharia de Energia", TRUE);
        define("AUTOMOTIVA", "Engenharia Automotiva", TRUE);
        define("AEROESPACIAL", "Engenharia Aeroespacial", TRUE);

        return array(ENGENHARIA, SOFTWARE, ELETRONICA, ENERGIA, AUTOMOTIVA, AEROESPACIAL);
    }

    public function getEdicao() {
        //Method to access the instance of edition attribute
        return $this->edicao;
    }

    public function setEdicao($edition) {
        //Method to modify the instance of the edition attribute
        $this->edicao = $edition;
    }

    public function getEditora() {
        //Method to access the instance of publishing house attribute
        return $this->editora;
    }

    public function setEditora($publisher) {
        //Method to modify the instance of the publishing house attribute

        if (!ValidaDados::validaCamposNulos($publisher)) {
            throw new ExcessaoEditoraInvalida("A Editora do Livro nao pode ser nula!");
        } else {
            $this->editora = $publisher;
        }
    }

    public function getEstado() {
        //Method to access the instance of status attribute
        return $this->estado;
    }

    public function setEstado($status) {
        //Method to modify the instance of the status attribute
        $this->estado = $status;
    }

}

?>
