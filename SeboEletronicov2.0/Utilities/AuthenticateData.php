<?php

/*
  File name: AuthenticateData.php
  File description: check informations
 */

class AuthenticateData {

    public function validatesFieldsNull($field) {
        return !(empty($field));
        // returns true if the variable is empty 
        // with this, the value false eh inverted and sent as true
    }

    public function validatesPasswordNull($password) {
        //Check if password is null
        return (!(empty($password[0])) && !(empty($password[1])));
    }

    public function validatesName($name) {
        //Check name provided by user

        $validCharacters = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù';

        for ($i = 0; $i < strlen($name); $i++) {
            $character = stripos($validCharacters, $name[$i]);
            if (!$character) {
                return 1;
            }

            if ($name[$i] == " " && $name[$i + 1] == " ") {
                return 2;
            }
        }
    }

    public function validatesEmail($email) {
        //Check email provided by user

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 1;
        }
    }

    public function validatesTelephone($telephone) {
        //Check telephone provided by user

        if (!filter_var($telephone, FILTER_VALIDATE_INT)) {
            return 1;
        } elseif (strlen($telephone) != 8) {
            return 2;
        }
    }

    public function validatesPassword($password) {
        //Check password provided by user

        if (!filter_var($password[0], FILTER_VALIDATE_INT)) {//caracter invalido
            return 1;
        } elseif (strlen($password[0]) != 6 || strlen($password[1]) != 6) {//tamanho invalido
            return 2;
        } elseif ($password[0] != $password[1]) {//senha e confirmação diferentes
            return 3;
        }
    }

}

?>
