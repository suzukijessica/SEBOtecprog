<?php
/*
 File name: ExcessaoEmailInvalido.php
 File description: establishes exception when an invalid password is inserted.
 Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
*/ 
class ExcessaoSenhaInvalida extends Exception {
    
    function __construct($mensagem) {
        parent::__construct($mensagem);
    }
}

?>
