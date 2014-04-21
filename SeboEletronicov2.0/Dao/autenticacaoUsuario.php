<?php

/*
  File name: autenticacaoUsuario.php
  File description: check email and password of user
  Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
 */
include '../Utilidades/ConexaoComBanco.php';


$user_email = $_POST['email'];
$userPassword = $_POST['senha'];

$sql_command = mysql_query("SELECT * FROM usuario WHERE email_usuario = '" . $user_email . "'") or die(mysql_error());
$sql_command2 = mysql_query("SELECT * FROM senha WHERE codigo_senha ='" . $userPassword . "'");
$row = mysql_num_rows($sql_command);
$row2 = mysql_num_rows($sql_command2);

$user_name = mysql_fetch_array($sql_command);
$id_user = $user_name['id_usuario'];

if ($row == $row2) {
    
    if ($row > 0) {
        session_start();
        $_SESSION['email'] = $user_email;
        $_SESSION['senha'] = $userPassword;
        $_SESSION['id_usuario'] = $id_user;
        //echo "<script>alert('Seja bem vindo ao SEBO Eletronico!')</script>";
        echo"<script>window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/indexLogin.php'</script>";
    } else {
        //nothing to do - proceed to the next step function
        
    }
    
} else {
    echo "<script>alert('Email de usuario ou senha invalido, tente novamente!')</script>";
    echo "<script>  window.location='http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/entrarLogin.php'</script>";
    
}
?>

