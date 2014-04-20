<?php

/*
  File name: ExcessaoTelefoneInvalido.php
  File description: establishes exception when an invalid telephone is inserted.
  Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
 */

class ExcessaoTelefoneInvalido extends Exception {

    function __construct($message) {
        parent::__construct($message);
    }

}

?>
