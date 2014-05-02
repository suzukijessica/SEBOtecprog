<?php

/*
  File name: ExcessaoTelefoneInvalido.php
  File description: establishes exception when an invalid telephone is inserted.
 */

class ExceptionPhoneWrong extends Exception {

    function __construct($message) {
        parent::__construct($message);
    }

}

?>
