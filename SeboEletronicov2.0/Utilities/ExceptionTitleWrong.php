<?php

/*
  File name: ExcessaoTituloInvalido.php
  File description: establishes exception when an invalid title is inserted.
  Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
 */

class ExcessaoTituloInvalido extends Exception {

    function __construct($message) {
        parent::__construct($message);
    }

}

?>
