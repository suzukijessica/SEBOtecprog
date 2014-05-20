<?php

/*
  File name: ExceptionTitleWrong.php
  File description: establishes exception when an invalid title is inserted.
 */

class ExceptionTitleWrong extends Exception {

    function __construct($message) {
        parent::__construct($message);
    }

}

?>
