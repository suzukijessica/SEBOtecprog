<?php
/*
  File name: UsuarioControlador.php
  File description: controls actions of save, check, change, delete and search the users
 */

include '../Modelo/Usuario.php';

class UsuarioControlador {

    public function salvaUsuario($user_name, $user_email, $user_phone, $user_password) {
        //saves user control actions in the database

        try {
            $user = new Usuario($user_name, $user_email, $user_phone, $user_password);
        } catch (Exception $exception_control_user) {
            print"<script>alert('" . $exception_control_user->getMessage() . "')</script>";
            echo "<script>window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/cadastrarUsuario.php'; </script>";
            exit;
        }
        return UsuarioDao::salvaUsuario($user);
    }

    public function checaCadastroId($id_user) {
        //checks the unique identifier for each registered user
        return UsuarioDao::getCadastradosPorId($id_user);
    }

    public function alterarCadastro($user_name, $user_email, $user_phone, $user_password, $id_user, $old_user_password) {
        //controls actions to change the user's registration data into the database

        try {

            $user = new Usuario($user_name, $user_email, $user_phone, $user_password);
        } catch (Exception $exception_control_user_change_user) {
            print"<script>alert('" . $exception_control_user_change_user->getMessage() . "')</script>";
            echo "<script>window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/alteraUsuario.php'; </script>";
            exit;
        }
        return UsuarioDao::alteraUsuario($user, $id_user, $old_user_password);
    }

    public function deletaCadastro($user_email, $user_password) {
        //controls actions to delete the registration of the User Database

        return UsuarioDao::deletaUsuario($user_email, $user_password);
    }

    public function pesquisaUsuario($user_name) {
        //controls actions of search information of membership of a User on the database by name

        return UsuarioDao::pesquisaUsuario($user_name);
    }

}

?>
