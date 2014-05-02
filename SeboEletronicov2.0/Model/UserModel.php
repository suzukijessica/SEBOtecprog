<?php

/*
  File name: Usuario.php
  File description: model of user
 */

include '../Utilities/AuthenticateData.php';
include '../Utilities/ExceptionNameWrong.php';
include '../Utilities/ExceptionPhoneWrong.php';
include '../Utilities/ExceptionEmailWrong.php';
include '../Utilities/ExceptionPasswordWrong.php';
include '../DaoProject/UserDao.php';

class UserModel {

    private $name;
    private $telephone;
    private $email;
    private $password;

    public function __construct($name, $telephone, $email, $password) {
        //Constructor method of class
        $this->setNome($name);
        $this->setTelefone($telephone);
        $this->setEmail($email);
        $this->setSenha($password);
    }

    public function getNome() {
        //Method to access the instance of name attribute
        return $this->nome;
    }

    public function setNome($name) {
        //Method to modify the instance of the name attribute 

        if (!AuthenticateData::validaCamposNulos($name)) {
            throw new ExcessaoNomeInvalido("Nome nao pode ser nulo!");
        } elseif (AuthenticateData::validaNome($name) == 1) {
            throw new ExcessaoNomeInvalido("Nome contem caracteres invalidos!");
        } elseif (AuthenticateData::validaNome($name) == 2) {
            throw new ExcessaoNomeInvalido("Nome contem espaços seguidos!");
        } else {
            $this->nome = $name;
        }
    }

    public function getTelefone() {
        //Method to access the instance of phone attribute
        return $this->telefone;
    }

    public function setTelefone($telephone) {
        //Method to modify the instance of the telephone attribute 

        if (!AuthenticateData::validaCamposNulos($telephone)) {
            throw new ExcessaoTelefoneInvalido("Telefone nao pode ser nulo!");
        } elseif (AuthenticateData::validaTelefone($telefone) == 1) {
            throw new ExcessaoTelefoneInvalido("Telefone nao pode conter caracteres alfabeticos!");
        } elseif (AuthenticateData::validaTelefone($telephone) == 2) {
            throw new ExcessaoTelefoneInvalido("Telefone deve conter exatamente oito (8) digitos!");
        } else {
            $this->telefone = $telephone;
        }
    }

    public function getEmail() {
        //Method to access the instance of email attribute
        return $this->email;
    }

    public function setEmail($email) {
        //Method to modify the instance of the email attribute 

        if (!AuthenticateData::validaCamposNulos($email)) {
            throw new ExcessaoEmailInvalido("E-mail nao pode ser nulo!");
        } elseif (AuthenticateData::validaEmail($email) == 1) {
            throw new ExcessaoEmailInvalido("E-mail nao válido!");
        } else {
            $this->email = $email;
        }
    }

    public function getSenha() {
        //Method to access the instance of password attribute
        return $this->senha;
    }

    public function setSenha($password) {
        //Method to modify the instance of the password attribute   

        $auxiliar = AuthenticateData::validaSenha($password);

        if (!AuthenticateData::validaSenhaNula($password)) {
            throw new ExcessaoSenhaInvalida("Senha nao pode ser nula!");
        } elseif ($auxiliar == 1) {
            throw new ExcessaoSenhaInvalida("Senha contem caracteres invalidos!");
        } elseif ($auxiliar == 2) {
            throw new ExcessaoSenhaInvalida("Senha deve conter exatamente seis (6) digitos!");
        } elseif ($auxiliar == 3) {
            throw new ExcessaoSenhaInvalida("Senha e confirmação estão diferentes!");
        } else {
            $this->senha = $password;
        }
    }

}

?>
