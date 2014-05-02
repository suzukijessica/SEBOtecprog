<?php

/*
  File name: ExcessaoEmailInvalido.php
  File description: establishes exception when an invalid e-mail is inserted.
 */

class ExceptionEmailWrong extends Exception {

    function __construct($message) {
        parent::__construct($message);
    }

}
?>

