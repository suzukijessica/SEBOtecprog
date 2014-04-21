<?php

/*
  File name: UsuarioDao.php
  File description: establishes mechanisms for data access to the database.
  Authors: Caique Pereira
 */

include "../Utilidades/ConexaoComBanco.php";

class UsuarioDao {

    public function salvaUsuario($user_name) {
        //saves user in data base
        $auxiliar_password = $user_name->getSenha();
        $final_password = $auxiliar_password[0];

        $sql_command = "INSERT INTO senha (codigo_senha) VALUES ('" . $final_password . "')";
        mysql_query($sql_command);

        $sql_command2 = "SELECT id_senha FROM senha WHERE codigo_senha='" . $final_password . "'";
        $result_query = $id_senha = mysql_query($sql_command2);
        $id_password = mysql_fetch_array($result_query);

        $sql_command3 = "INSERT INTO usuario (nome_usuario, email_usuario, telefone_usuario, senha_usuario) VALUES ('" . $user_name->getNome() . "', '" . $user_name->getEmail() . "', 
            '" . $user_name->getTelefone() . "','" . $id_password['id_senha'] . "')";
        $user_query_return = mysql_query($sql_command3);

        return $user_query_return;
    }

    public function alteraUsuario($user_name, $id_user, $user_old_password) {
        //changes the registration data in the database

        $auxiliar_password = $user_name->getSenha();
        $change_password = $auxiliar_password[0];

        $sql = "UPDATE usuario SET nome_usuario = '" . $id_user->getNome() . "' , telefone_usuario = '" . $user_name->getTelefone() . "', 
            email_usuario = '" . $user_name->getEmail() . "' WHERE id_usuario = '" . $id_user . "'";
        $usuario = mysql_query($sql);

        if ($change_password != $user_old_password) {

            $sql_command2= "SELECT id_senha FROM senha WHERE codigo_senha='" . $user_old_password . "'";
            $result_query = mysql_query($sql_command2);
            $id_password = mysql_fetch_row($result_query);

            $sql_command3 = "Update senha SET codigo_senha = '" . $change_password . "' WHERE id_senha = '" . $id_password[0] . "'";
            $saved_password = mysql_query($sql_command3);
        } else{
            //nothing to do - proceed to the next step function
            
        }

        return ($user_name && $saved_password);
    }

    public function pesquisaUsuario($user_name) {
        //searches the user's registration information in the database by his name

        $sql_command = "SELECT * FROM usuario WHERE nome_usuario = '" . $user_name . "'";
        $result_query = mysql_query($sql_command);
        $founding_user = mysql_fetch_row($result_query);

        return $founding_user;
    }

    public function deletaUsuario($user_email, $user_password) {
        //excludes the user's registration from the database

        $sql_command = "DELETE FROM usuario WHERE email_usuario = '" . $user_email . "'";
        $deleted_user = mysql_query($sql_command);

        $sql_command1 = "DELETE FROM senha WHERE codigo_senha = '" . $user_password . "'";
        $deleted_password = mysql_query($sql_command1);

        return ($deleted_user && $deleted_password);
    }

    public function getCadastradosPorId($id_person) {
        //get the registrated users by id

        $sql_command = "SELECT * FROM usuario WHERE id_usuario = '" . $id_person . "'";
        $result_query = mysql_query($sql_command);

        $result_fetch_array = mysql_fetch_array($result_query);

        return $result_fetch_array;
    }

}

?>
