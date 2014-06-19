<?php

/*
  File name: ExceptionPasswordWrong.php
  File description: establishes exception when an invalid password is inserted.
 */

class ExceptionPasswordWrong extends Exception {

    function __construct($message) {
        parent::__construct($message);
    }

}

?>
