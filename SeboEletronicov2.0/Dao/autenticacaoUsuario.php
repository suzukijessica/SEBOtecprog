<?php
include '../Utilidades/ConexaoComBanco.php';

 include '../Utilidades/Redireciona.js';


$email = $_POST['email'];

$senha = $_POST['senha'];

$sql = mysql_query("SELECT * FROM usuario WHERE email_usuario = '".$email."'") or die(mysql_error());
$sql2 = mysql_query("SELECT * FROM senha WHERE codigo_senha ='".$senha."'");
$row = mysql_num_rows($sql);
$row2 = mysql_num_rows($sql2);

$usuario = mysql_fetch_array($sql);
$idUsuario = $usuario['id_usuario'];
if($row == $row2){
    if($row>0){
        echo "<script>alert('Seja bem vindo ao SEBO Eletronico!')</script>";
        echo"<script>loginsuccessfully($idUsuario)</script>";
    }
}else{
        echo "<script>alert('Email de usuario ou senha invalido, tente novamente!')</script>";
        echo "<script>loginfailed()</script>"; 
    }
?>

