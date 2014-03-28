<?php
/*
 File name: LivroControlador.php
 File description: insert, select, update, delete Livros calling methods of class LivroDao.
 Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
*/

include '../Modelo/Livro.php';
    
class LivroControlador {
    
    public function salvaLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_dono){
    // Insert Livro in Database calling method "salvaLivro" of class LivroDao
       
       if(empty($venda) && empty($troca)){
            $venda = "venda";
            $troca = "troca";
        }

        try{
            $livro = new Livro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao);
        }catch(Exception $e){
            print"<script>alert('".$e->getMessage()."')</script>";
            echo "<script>window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/cadastrarLivro.php';</script>";
            exit;    
        }
        return LivroDao::salvaLivro($livro, $id_dono);
    }
    
    public function pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca){
    // Selects Livro in Database calling method "pesquisaLivro" of class LivroDaoo   
       return LivroDao:: pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca);
    }
    
    public function getLivroById($id){
        return LivroDao::getLivroById($id);
    }
    
    public function deletaLivro($idLivro){
    // Delete Livro in Database calling method "deletaLivro" of class LivroDao 
        return LivroDao::deletaLivro($idLivro);
        }
    
    public function alteraLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_dono, $id_usuario){
    // Update book parameters in Database calling method "alteraLivro" of class LivroDao    
        if(empty($venda) && empty($troca)){
            $venda = "venda";
            $troca = "troca";
        }

        try{
            $livro = new Livro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao);
        }catch(Exception $e){
            print"<script>alert('".$e->getMessage()."')</script>";
            echo "<script>window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/cadastrarLivro.php';</script>";
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
