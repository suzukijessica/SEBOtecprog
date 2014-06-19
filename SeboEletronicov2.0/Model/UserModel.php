<?php

/*
  File name: UserModel.php
  File description: model of user
 */

include '../Utilities/AuthenticateData.php';
include '../Exceptions/ExceptionNameWrong.php';
include '../Exceptions/ExceptionPhoneWrong.php';
include '../Exceptions/ExceptionEmailWrong.php';
include '../Exceptions/ExceptionPasswordWrong.php';
include '../Dao/UserDao.php';

class UserModel {

    private $name;
    private $telephone;
    private $email;
    private $password;

    public function __construct($name, $telephone, $email, $password) {
        //Constructor method of class
        $this->setName($name);
        $this->setTelephone($telephone);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function getName() {
        //Method to access the instance of name attribute
        return $this->name;
    }

    public function setName($name) {
        //Method to modify the instance of the name attribute 

        if (!AuthenticateData::validatesFieldsNull($name)) {
            throw new ExceptionNameWrong("Nome nao pode ser nulo!");
        } elseif (AuthenticateData::validatesName($name) == 1) {
            throw new ExceptionNameWrong("Nome contem caracteres invalidos!");
        } elseif (AuthenticateData::validatesName($name) == 2) {
            throw new ExceptionNameWrong("Nome contem espaços seguidos!");
        } else {
            $this->name = $name;
        }
    }

    public function getTelephone() {
        //Method to access the instance of phone attribute
        return $this->telephone;
    }

    public function setTelephone($telephone) {
        //Method to modify the instance of the telephone attribute 

        if (!AuthenticateData::validatesFieldsNull($telephone)) {
            throw new ExceptionPhoneWrong("Telefone nao pode ser nulo!");
        } elseif (AuthenticateData::validatesTelephone($telephone) == 1) {
            throw new ExceptionPhoneWrong("Telefone nao pode conter caracteres alfabeticos!");
        } elseif (AuthenticateData::validatesTelephone($telephone) == 2) {
            throw new ExceptionPhoneWrong("Telefone deve conter exatamente oito (8) digitos!");
        } else {
            $this->telephone = $telephone;
        }
    }

    public function getEmail() {
        //Method to access the instance of email attribute
        return $this->email;
    }

    public function setEmail($email) {
        //Method to modify the instance of the email attribute 

        if (!AuthenticateData::validatesFieldsNull($email)) {
            throw new ExceptionEmailWrong("E-mail nao pode ser nulo!");
        } elseif (AuthenticateData::validatesEmail($email) == 1) {
            throw new ExceptionEmailWrong("E-mail nao válido!");
        } else {
            $this->email = $email;
        }
    }

    public function getPassword() {
        //Method to access the instance of password attribute
        return $this->password;
    }

    public function setPassword($password) {
        //Method to modify the instance of the password attribute   

        $auxiliar = AuthenticateData::validatesPassword($password);

        if (!AuthenticateData::validatesPasswordNull($password)) {
            throw new ExceptionPasswordWrong("Senha nao pode ser nula!");
        } elseif ($auxiliar == 1) {
            throw new ExceptionPasswordWrong("Senha contem caracteres invalidos!");
        } elseif ($auxiliar == 2) {
            throw new ExceptionPasswordWrong("Senha deve conter exatamente seis (6) digitos!");
        } elseif ($auxiliar == 3) {
            throw new ExceptionPasswordWrong("Senha e confirmação estão diferentes!");
        } else {
            $this->password = $password;
        }
    }

}

?>
