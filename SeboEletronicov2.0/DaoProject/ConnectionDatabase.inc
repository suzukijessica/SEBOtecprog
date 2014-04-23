<?php

/*
  File name: conexao_bd.php
  File description: connect with database
  Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
 */
$establishesConnection = mysql_connect("localhost", "root", "");
    if (!$establishesConnection){
        die("<h1>Falha na Conexao </h1>");
    }else{
        //nothing to do - proceed to the next step function
    }
    
$dataBase = mysql_select_db("sebo eletronico");
?>