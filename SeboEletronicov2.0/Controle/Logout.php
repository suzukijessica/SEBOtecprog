<?php
/*
 File name: Logout.php
 File description: logout of system
 Authors: Caique Pereira, Jessica Suzuki, João Gabriel, Macário Soares, Victor Cunha.
*/
    session_start();
    session_destroy();
    header("Location: ../Visao/site.php");
?>