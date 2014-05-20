<?php
/*
  File name: UserController.php
  File description: controls actions of save, check, change, delete and search the users
 */

include '../Model/UserModel.php';

class UserController {

    public function savesUser($userName, $userEmail, $userPhone, $userPassword) {
        //saves user control actions in the database

        try {
            $user = new UserModel($userName, $userEmail, $userPhone, $userPassword);
        } catch (Exception $exceptionControlUser) {
            print"<script>alert('" . $exceptionControlUser->getMessage() . "')</script>";
            echo "<script>window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/View/RegisterUser.php'; </script>";
            exit;
        }
        return UserDao::savesUserDao($user);
    }

    public function checksCadastreById($idUser) {
        //checks the unique identifier for each registered user
        return UserDao::getCadastredById($idUser);
    }

    public function changesCadastre($userName, $userEmail, $userPhone, $userPassword, $idUser, $oldUserPassword) {
        //controls actions to change the user's registration data into the database

        try {

            $user = new UserModel($userName, $userEmail, $userPhone, $userPassword);
        } catch (Exception $exceptionControlUserChangeUser) {
            print"<script>alert('" . $exceptionControlUserChangeUser->getMessage() . "')</script>";
            echo "<script>window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/View/ChangeUser.php'; </script>";
            exit;
        }
        return UserDao::changesUserDao($user, $idUser, $oldUserPassword);
    }

    public function deletesCadastre($userEmail, $userPassword) {
        //controls actions to delete the registration of the User Database

        return UserDao::deletesUserDao($userEmail, $userPassword);
    }

    public function searchesUser($userName) {
        //controls actions of search information of membership of a User on the database by name

        return UserDao::searchesUserDao($userName);
    }

}

?>
