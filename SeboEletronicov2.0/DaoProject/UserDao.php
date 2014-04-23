<?php

/*
  File name: UsuarioDao.php
  File description: establishes mechanisms for data access to the database.
  Authors: Caique Pereira
 */

include "../Utilidades/ConexaoComBanco.php";

class UserDao {

    public function savesUserDao($userName) {
        //saves user in data base
        $auxiliarPassword = $userName->getSenha();
        $finalPassword = $auxiliarPassword[0];

        $sqlCommand = "INSERT INTO senha (codigo_senha) VALUES ('" . $finalPassword . "')";
        mysql_query($sqlCommand);

        $sqlCommand2 = "SELECT id_senha FROM senha WHERE codigo_senha='" . $finalPassword . "'";
        $resultQuery = $idPassword = mysql_query($sqlCommand2);
        $idPassword = mysql_fetch_array($resultQuery);

        $sqlCommand3 = "INSERT INTO usuario (nome_usuario, email_usuario, telefone_usuario, senha_usuario) VALUES ('" . $userName->getNome() . "', '" . $userName->getEmail() . "', 
            '" . $userName->getTelefone() . "','" . $idPassword['id_senha'] . "')";
        $userQueryReturn = mysql_query($sqlCommand3);

        return $userQueryReturn;
    }

    public function changesUserDao($userName, $idUser, $userOldPassword) {
        //changes the registration data in the database

        $auxiliarPassword = $userName->getSenha();
        $changePassword = $auxiliarPassword[0];

        $sqlCommand = "UPDATE usuario SET nome_usuario = '" . $idUser->getNome() . "' , telefone_usuario = '" . $userName->getTelefone() . "', 
            email_usuario = '" . $userName->getEmail() . "' WHERE id_usuario = '" . $idUser . "'";
        $user = mysql_query($sqlCommand);

        if ($changePassword != $userOldPassword) {

            $sqlCommand2= "SELECT id_senha FROM senha WHERE codigo_senha='" . $userOldPassword . "'";
            $resultQuery = mysql_query($sqlCommand2);
            $idPassword = mysql_fetch_row($resultQuery);

            $sqlCommand3 = "Update senha SET codigo_senha = '" . $changePassword . "' WHERE id_senha = '" . $idPassword[0] . "'";
            $savedPassword = mysql_query($sqlCommand3);
        } else{
            //nothing to do - proceed to the next step function
            
        }

        return ($userName && $savedPassword);
    }

    public function searchesUserDao($userName) {
        //searches the user's registration information in the database by his name

        $sqlCommand = "SELECT * FROM usuario WHERE nome_usuario = '" . $userName . "'";
        $resultQuery = mysql_query($sqlCommand);
        $foundingUser = mysql_fetch_row($resultQuery);

        return $foundingUser;
    }

    public function deletesUserDao($userEmail, $userPassword) {
        //excludes the user's registration from the database

        $sqlCommand = "DELETE FROM usuario WHERE email_usuario = '" . $userEmail . "'";
        $deletedUser = mysql_query($sqlCommand);

        $sqlCommand1 = "DELETE FROM senha WHERE codigo_senha = '" . $userPassword . "'";
        $deletedPassword = mysql_query($sqlCommand1);

        return ($deletedUser && $deletedPassword);
    }

    public function getCadastredById($idPerson) {
        //get the registrated users by id

        $sqlCommand = "SELECT * FROM usuario WHERE id_usuario = '" . $idPerson . "'";
        $resultQuery = mysql_query($sqlCommand);

        $resultFetchArray = mysql_fetch_array($resultQuery);

        return $resultFetchArray;
    }

}

?>
