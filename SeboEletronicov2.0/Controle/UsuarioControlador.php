<?php
/*
 File name: UsuarioControlador.php
 File description: controls actions of save, check, change, delete and search the users
 Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
*/

include '../Modelo/Usuario.php';

class UsuarioControlador {
    
    
        public function salvaUsuario($nome, $email, $telefone, $senha){
        //saves user control actions in the database
            
            try{
                $usuario = new Usuario($nome, $telefone, $email, $senha);
            }catch(Exception $e){
                print"<script>alert('".$e->getMessage()."')</script>";
                echo "<script>window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/cadastrarUsuario.php'; </script>";
                exit;    
            }
           return UsuarioDao::salvaUsuario($usuario);
        }

       
        public function checaCadastroId($id){
        //checks the unique identifier for each registered user
            return UsuarioDao::getCadastradosPorId($id);
        }

        public function alterarCadastro($nome, $email, $telefone, $senha, $id, $senhaVelha){
        //controls actions to change the user's registration data into the database
            
            try{
                
                $usuario = new Usuario($nome, $telefone, $email, $senha);
            }catch(Exception $e){
                print"<script>alert('".$e->getMessage()."')</script>";
                echo "<script>window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/alteraUsuario.php'; </script>";
                exit;    
            }
           return UsuarioDao::alteraUsuario($usuario,$id, $senhaVelha);
        
        }
        
        public function deletaCadastro($email, $senha){
        //controls actions to delete the registration of the User Database
            
            return UsuarioDao::deletaUsuario($email, $senha);
   
        }

        public function pesquisaUsuario($nome){
        //controls actions of search information of membership of a User on the database by name
            
            return UsuarioDao::pesquisaUsuario($nome);
        } 
}

?>
