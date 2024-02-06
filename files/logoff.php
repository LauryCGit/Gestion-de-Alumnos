<?php
//Destruimos las vairables que creamos en el login
  
    session_start();
    unset($_SESSION['id_cuenta']);
    unset($_SESSION['cuenta']);
    unset($_SESSION['usuario']);
    unset($_SESSION['perfil']);
    unset($_SESSION['logueado']);

    session_destroy();
    if((session_id() != "") || isset($_COOKIE[session_name()])){
        if(setcookie(session_name(), '' , time()-3600, '/')){
            header('Refresh:1;URL=../index.php');
        }
    }

?>
 

