<?php

/*
  File name: ExceptionNameWrong.php
  File description: establishes exception when an invalid name is inserted.
 */

class ExceptionNameWrong extends Exception {

    function __construct($message) {
        parent::__construct($message);
    }

}

?>
