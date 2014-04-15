<?php
/*
 File name: site.php
 File description: data view to the site
*/

session_start();
$idUser = $_SESSION['id_usuario'];
?>
<!DOCTYPE HTML>
<html>
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/css/UsuarioStyle.css" type="text/css" media="all">
        <link rel="stylesheet" href="http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/css/main.css" type="text/css" media="all">
        <link rel="shortcut icon" href="http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/img/android.ico">
        <script src="http://localhost/SEBOtecprog/SeboEletronicov2.0/Utilidades/Redireciona.js"></script> 
        
    <title>Sebo Eletrônico</title>
    
</head>
<body>
    <div id="header">
		<div id="logo"><img src="http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/img/sebo_header.png" class="imgHeader"/></div>
    </div>
   
   <div id="mainmenu">
       
       <button class="button" onclick="login();">Login</button>
       
   </div>
   
    <img src="http://localhost/SEBOtecprog/SeboEletronicov2.0/Visao/img/LogoSebo.jpg" class="img"/>
    
</body>


</html>