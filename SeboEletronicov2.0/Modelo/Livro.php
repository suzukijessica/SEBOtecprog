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
    
    private $titulo;
    private $autor;
    private $genero;
    private $edicao;
    private $editora;
    private $venda;
    private $troca;
    private $estado;
    private $descricao;
    
    
    function __construct($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao) {
    //Constructor method of class
        $this->setTitulo($titulo);
        $this->setAutor($autor);
        $this->setGenero($genero);
        $this->setEdicao($edicao);
        $this->setEditora($editora);
        $this->setVenda($venda);
        $this->setTroca($troca);
        $this->setEstado($estado);
        $this->setDescricao($descricao);
    }
    
    public function getTitulo() {
    //Method to access the instance of title attribute
        return $this->titulo;
    }

    public function setTitulo($titulo) {
    //Method to modify the instance of the title attribute
        if(!ValidaDados::validaCamposnulos($titulo)){
            throw new ExcessaoTituloInvalido("Titulo nao pode ser nulo!");
        }else{
            $this->titulo = $titulo;
        }
    }

    public function getAutor() {
    //Method to access the instance of author attribute
        return $this->autor;   
    }

    public function setAutor($autor) {
    //Method to modify the instance of the author attribute
        if(!ValidaDados::validaCamposNulos($autor)){
            throw new ExcessaoNomeInvalido("O nome do Autor nao pode ser nulo!");
        }elseif(ValidaDados::validaNome($autor) == 1){
            throw new ExcessaoNomeInvalido("Nome do Autor contem caracteres invalidos!");
        }elseif(ValidaDados::validaNome($autor) == 2){
            throw new ExcessaoNomeInvalido("Nome do Autor contem espaços seguidos!");
        }else{
            $this->autor = $autor;
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

    public function setTroca($troca) {
    //Method to modify the instance of switch attribute
        $this->troca = $troca;
    }
    
    public function getVenda() {
    //Method to access the instance of sale attribute
        return $this->venda;
    }

    public function setVenda($venda) {
    //Method to modify the instance of the sale attribute
        $this->venda = $venda;
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
        
        return array(ENGENHARIA,SOFTWARE, ELETRONICA, ENERGIA, AUTOMOTIVA, AEROESPACIAL);
    }
    
    public function getEdicao() {
    //Method to access the instance of edition attribute
        return $this->edicao;
    }
    
    public function setEdicao($edicao){
    //Method to modify the instance of the edition attribute
        $this->edicao = $edicao;
    }
    
    public function getEditora(){
    //Method to access the instance of publishing house attribute
        return $this->editora;
    }
    
    public function setEditora($editora){
    //Method to modify the instance of the publishing house attribute
        
        if(!ValidaDados::validaCamposNulos($editora)){
            throw new ExcessaoEditoraInvalida("A Editora do Livro nao pode ser nula!");
        }else{
            $this->editora = $editora;
        }
    }
    
    public function getEstado() {
    //Method to access the instance of status attribute
        return $this->estado;
    }
   
    public function setEstado($estado){
    //Method to modify the instance of the status attribute
        $this->estado = $estado;
    }
    
}
?>
