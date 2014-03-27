<?php
/*
 File name: ExcessaoEmailInvalido.php
 File description: establishes exception when an invalid name is inserted.
 Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
*/ 
class ExcessaoNomeInvalido extends Exception{
    
    function __construct($mensagem) {
        parent::__construct($mensagem);
    }
}

?>
