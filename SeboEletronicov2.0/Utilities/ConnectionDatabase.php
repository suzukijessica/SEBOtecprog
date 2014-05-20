<?php

/*
  File name: ConnectionDatabase.php
  File description: establishes conection to the database.
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
