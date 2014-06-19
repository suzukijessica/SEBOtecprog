<?php

/*
  File name: BookModel.php
  File description: model of book.
 */

include '../Dao/BookDao.php';
include '../Utilities/AuthenticateData.php';
include '../Exceptions/ExceptionNameWrong.php';
include '../Exceptions/ExceptionTileWrong.php';
include '../Exceptions/ExceptionPublishingWrong.php';

class BookModel {

    private $title;
    private $author;
    private $genre;
    private $edition;
    private $publisher;
    private $sale;
    private $swap;
    private $status;
    private $description;

    function __construct($title, $author, $genre, $edition, $publisher, $sale, $swap, $status, $description) {
        //Constructor method of class
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setGenre($genre);
        $this->setEdition($edition);
        $this->setPublisher($publisher);
        $this->setSale($sale);
        $this->setSwap($swap);
        $this->setStatus($status);
        $this->setDescription($description);
    }

    public function getTitle() {
        //Method to access the instance of title attribute
        return $this->title;
    }

    public function setTitle($title) {
        //Method to modify the instance of the title attribute
        if (!AuthenticateData::validatesFieldsNull($title)) {
            throw new ExceptionTitleWrong("Titulo nao pode ser nulo!");
        } else {
            $this->title = $title;
        }
    }

    public function getAuthor() {
        //Method to access the instance of author attribute
        return $this->author;
    }

    public function setAuthor($author) {
        //Method to modify the instance of the author attribute
        if (!AuthenticateData::validatesFieldsNull($author)) {
            throw new ExceptionNameWrong("O nome do Autor nao pode ser nulo!");
        } elseif (AuthenticateData::validaNome($author) == 1) {
            throw new ExceptionNameWrong("Nome do Autor contem caracteres invalidos!");
        } elseif (AuthenticateData::validaNome($author) == 2) {
            throw new ExceptionNameWrong("Nome do Autor contem espaços seguidos!");
        } else {
            $this->author = $author;
        }
    }

    public function getGenre() {
        //Method to access the instance of gender attribute
        return $this->genre;
    }

    public function setGenre($genre) {
        //Method to modify the instance of the gender attribute
        $this->genre = $genre;
    }

    public function getSwap() {
        //Method to access the instance of switch attribute
        return $this->swap;
    }

    public function setSwap($swap) {
        //Method to modify the instance of switch attribute
        $this->swap = $swap;
    }

    public function getSale() {
        //Method to access the instance of sale attribute
        return $this->sale;
    }

    public function setSale($sale) {
        //Method to modify the instance of the sale attribute
        $this->sale = $sale;
    }

    public function getDescription() {
        //Method to access the instance of description attribute
        return $this->description;
    }

    public function setDescription($description) {
        //Method to modify the instance of description attribute
        $this->description = $description;
    }

    public function defineTypesOfGenres() {
        //Method to define type of gender
        define("ENGENHARIA", "Engenharia", TRUE);
        define("SOFTWARE", "Engenharia de Software", TRUE);
        define("ELETRONICA", "Engenharia Eletronica", TRUE);
        define("ENERGIA", "Engenharia de Energia", TRUE);
        define("AUTOMOTIVA", "Engenharia Automotiva", TRUE);
        define("AEROESPACIAL", "Engenharia Aeroespacial", TRUE);

        return array(ENGENHARIA, SOFTWARE, ELETRONICA, ENERGIA, AUTOMOTIVA, AEROESPACIAL);
    }

    public function getEdition() {
        //Method to access the instance of edition attribute
        return $this->edition;
    }

    public function setEdition($edition) {
        //Method to modify the instance of the edition attribute
        $this->edition = $edition;
    }

    public function getPublisher() {
        //Method to access the instance of publishing house attribute
        return $this->publisher;
    }

    public function setPublisher($publisher) {
        //Method to modify the instance of the publishing house attribute

        if (!AuthenticateData::validatesFieldsNull($publisher)) {
            throw new ExceptionPublishingWrong("A Editora do Livro nao pode ser nula!");
        } else {
            $this->publisher = $publisher;
        }
    }

    public function getStatus() {
        //Method to access the instance of status attribute
        return $this->status;
    }

    public function setStatus($status) {
        //Method to modify the instance of the status attribute
        $this->status = $status;
    }

}

?>
