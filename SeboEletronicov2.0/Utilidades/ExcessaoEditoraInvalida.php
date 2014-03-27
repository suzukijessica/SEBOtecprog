<?php
/*
 File name: ExcessaoEditora.php
 File description: establishes conection to the database.
 Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha
*/ 

class ExcessaoEditoraInvalida extends Exception{
    function __construct($mensagem) {
        parent::__construct($mensagem);
    }
}

?>
