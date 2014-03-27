<?php

include '../Modelo/Livro.php';
    
class LivroControlador {
    
    public function salvaLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_dono){
    //Salva um livro no banco de dados chamando o metodo "salvaLivro" da classe LivroDao
       
       if(empty($venda) && empty($troca)){
            $venda = "venda";
            $troca = "troca";
        }

        try{
            $livro = new Livro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao);
        }catch(Exception $e){
            print"<script>alert('".$e->getMessage()."')</script>";
            echo "<script>window.location='http://localhost/SeboEletronicov2.0/Visao/cadastrarLivro.php';</script>";
            exit;    
        }
        return LivroDao::salvaLivro($livro, $id_dono);
    }
    
    public function pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca){
    //Faz a busca de um livro no banco de dados chamando o metodo "pesquisaLivro" da classe LivroDao   
       return LivroDao:: pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca);
    }
    
    public function getLivroById($id){
        return LivroDao::getLivroById($id);
    }
    
    public function deletaLivro($idLivro){
    //Faz a deleção de um livro no banco de dados chamando o metodo "deletaLivro" da classe LivroDao 
        return LivroDao::deletaLivro($idLivro);
        }
    
    public function alteraLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_dono, $id_usuario){
    //Altera um ou mais parametros de um livro no banco de dados chamando o metodo "alteraLivro" da classe LivroDao    
        if(empty($venda) && empty($troca)){
            $venda = "venda";
            $troca = "troca";
        }

        try{
            $livro = new Livro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao);
        }catch(Exception $e){
            print"<script>alert('".$e->getMessage()."')</script>";
            echo "<script>window.location='http://localhost/SeboEletronicov2.0/Visao/cadastrarLivro.php';</script>";
            exit;    
        }
        return LivroDao::alteraLivro($livro, $id_dono, $id_usuario);
    }
    
    public function getLivroByIdUsuario($idUsuario){
        return LivroDao::getLivroByIdUsuario($idUsuario);
    }
    
    public function getAllLivro(){
        return LivroDao::getAllLivro();
    }
    
}

?>
