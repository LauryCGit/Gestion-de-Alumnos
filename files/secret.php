<?php
    session_start();
    if(!isset($_SESSION['logueado']) || ($_SESSION['logueado'] != 2019)){
        header('Location:../index.php');
        die();
    }
    ?>


