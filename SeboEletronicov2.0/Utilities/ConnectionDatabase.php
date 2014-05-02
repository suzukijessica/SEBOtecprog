<?php

/*
  File name: ConexaoComBanco.php
  File description: establishes conection to the database.
  Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha
 */
$server = "localhost";
$userName = "root";
$userPassword = "";
$database_conexion = mysql_connect($server, $userName, $userPassword);

if (!$database_conexion) {
    die("Não foi possível conectar: " . mysql_error());
}
$dataBase = mysql_select_db("sebo eletronico");
?>
