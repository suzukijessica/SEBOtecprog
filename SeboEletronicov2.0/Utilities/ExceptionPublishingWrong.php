<?php

/*
  File name: ExcessaoEditora.php
  File description: establishes exception when an invalid editor is inserted.
 */

class ExceptionPublishingWrong extends Exception {

    function __construct($message) {
        parent::__construct($message);
    }

}

?>
