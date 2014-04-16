<?php

/*
  File name: ValidaDados.php
  File description: check informations
  Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
 */

class ValidaDados {

    public function validaCamposNulos($parametro) {
        return !(empty($parametro));
        // returns true if the variable is empty 
        // with this, the value false eh inverted and sent as true
    }

    public function validaSenhaNula($senha) {
        //Check if password is null
        return (!(empty($senha[0])) && !(empty($senha[1])));
    }

    public function validaNome($nome) {
        //Check name provided by user

        $caracteresValidos = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù';

        for ($i = 0; $i < strlen($nome); $i++) {
            $char = stripos($caracteresValidos, $nome[$i]);
            if (!$char) {
                return 1;
            }

            if ($nome[$i] == " " && $nome[$i + 1] == " ") {
                return 2;
            }
        }
    }

    public function validaEmail($email) {
        //Check email provided by user

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 1;
        }
    }

    public function validaTelefone($telefone) {
        //Check telephone provided by user

        if (!filter_var($telefone, FILTER_VALIDATE_INT)) {
            return 1;
        } elseif (strlen($telefone) != 8) {
            return 2;
        }
    }

    public function validaSenha($senha) {
        //Check password provided by user

        if (!filter_var($senha[0], FILTER_VALIDATE_INT)) {//caracter invalido
            return 1;
        } elseif (strlen($senha[0]) != 6 || strlen($senha[1]) != 6) {//tamanho invalido
            return 2;
        } elseif ($senha[0] != $senha[1]) {//senha e confirmação diferentes
            return 3;
        }
    }

}

?>
