<?php

include '../Modelo/Usuario.php';

class UsuarioControlador {
    
    
        public function salvaUsuario($nome, $email, $telefone, $senha){
        //salva usuário no banco de dados
            
            try{
                $usuario = new Usuario($nome, $telefone, $email, $senha);
            }catch(Exception $e){
                print"<script>alert('".$e->getMessage()."')</script>";
                echo "<script>window.location='http://localhost/SeboEletronicov2.0/Visao/cadastrarUsuario.php'; </script>";
                exit;    
            }
           return UsuarioDao::salvaUsuario($usuario);
        }

       
        public function checaCadastroId($id){
        //checa o identificador único para cada usuário cadastrado
            return UsuarioDao::getCadastradosPorId($id);
        }

        public function alterarCadastro($nome, $email, $telefone, $senha, $id, $senhaVelha){
        //altera dados do cadastro no banco de dados
            
            try{
                
                $usuario = new Usuario($nome, $telefone, $email, $senha);
            }catch(Exception $e){
                print"<script>alert('".$e->getMessage()."')</script>";
                echo "<script>window.location='http://localhost/SeboEletronicov2.0/Visao/alteraUsuario.php'; </script>";
                exit;    
            }
           return UsuarioDao::alteraUsuario($usuario,$id, $senhaVelha);
        
        }
        
        public function deletaCadastro($email, $senha){
        //exclui o cadastro do usuario do banco de dados
            
            return UsuarioDao::deletaUsuario($email, $senha);
   
        }

        public function pesquisaUsuario($nome){
        //pesquisa informaçoes de cadastro de um usuario no banco de dados pelo nome
            
            return UsuarioDao::pesquisaUsuario($nome);
        } 
}

?>
