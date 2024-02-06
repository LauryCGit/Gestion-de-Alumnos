<?php 
header("Refresh:5;URL=index.php")
?>

<!DOCTYPE html>

<html lang="es">
    <head>
    <meta charset="UTF-8">
    <title>Autenticación al Sistema</title>
     <?php require_once 'files/secciones/head.php'; ?>
    </head>
    <body>
    <header class="cabecera">
    <h1 class="h1 text-center" style="margin: 0 0 20px 0; color: aliceblue;">Sistema de gestión de alumnos</h1>
    <hr/>
    </header>
    <main class="container-fluid">
    <div class="alert alert-danger text-center"></div>
    <h1 class="text-center" style="color: red">NO AUTORIZADO!!!!!</h1> 
    <div class="alert alert-danger text-center">
    <p>Sera redireccionado en 5 segundos.</p>
    <p>Si no redirecciona -> <a href="index.php">ir al inicio</a></p>
    </div>
    </main>
    <footer class="piedepagina text-center text-muted bg-light">

    </footer> 
    </body>
</html>