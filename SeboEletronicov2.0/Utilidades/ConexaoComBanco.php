<?php
/*
File name: ConexaoComBanco.php
File description: establishes conection to the database.
Authors: Caique Pereira, Jessica Suzuki, Lucas Kanashiro, Macário Soares, 
*/    
        $server = "localhost";
        $username = "SeboEletronico";
        $senha = "sebo";
        $dbcon = mysql_connect($server, $username, $senha);
        
        if(!$dbcon){
            die ("Não foi possível conectar: " . mysql_error());
        }
        $bd = mysql_select_db ("sebo eletronico");
        
      
   
?>
