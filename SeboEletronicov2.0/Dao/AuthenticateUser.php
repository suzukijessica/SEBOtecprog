<?php

/*
  File name: AuthenticateUser.php
  File description: check email and password of user
 */
include '../Utilities/ConnectionDatabase.php';


$userEmail = $_POST['email'];
$userPassword = $_POST['senha'];

$sqlCommand = mysql_query("SELECT * FROM usuario WHERE email_usuario = '" . $userEmail . "'") or die(mysql_error());
$sqlCommand2 = mysql_query("SELECT * FROM senha WHERE codigo_senha ='" . $userPassword . "'");
$row = mysql_num_rows($sqlCommand);
$row2 = mysql_num_rows($sqlCommand2);

$userName = mysql_fetch_array($sqlCommand);
$idUser = $userName['id_usuario'];

if ($row == $row2) {
    
    if ($row > 0) {
        session_start();
        $_SESSION['email'] = $userEmail;
        $_SESSION['senha'] = $userPassword;
        $_SESSION['id_usuario'] = $idUser;
        echo"<script>window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/View/IndexLogin.php'</script>";
    } else {
        //nothing to do - proceed to the next step function
        
    }
    
} else {
    echo "<script>alert('Email de usuario ou senha invalido, tente novamente!')</script>";
    echo "<script>  window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/View/Login.php'</script>";
    
}
?>

