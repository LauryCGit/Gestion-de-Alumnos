<?php require_once 'secret.php';?>
<!DOCTYPE html>

<html>
    <head>
        <title>Home - Sistema</title>
        <?php require_once 'secciones/head.php'; ?>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
        <script defer src="js/valida_alta.js" type="text/javascript"></script>
        <script type="text/javascript" rel="javascript">
            function activar(){
                
                let link = document.getElementById("menuI");
                link.setAttribute("class","nav-link active");
            }
        </script> 
    </head>
    <body>
        
        <header>
             <h1>Gestión Alumnos Web</h1>
        </header>
        <main>
            <!-- Seccion menu principal-->
            <div class="card">
            <div class="card-header text-center">
                <div class="d-flex justify-content-between">
                    <div class="">Inicio</div>
                    <div class="salir">
                        <strong>¡Bienvenido <em><?php echo  $_SESSION['usuario'] ?></em>!</strong>
                        <a href="files/logoff.php" id=""><strong>Cerrar sesión</strong></a>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                
                <?php require_once 'secciones/menu.php'; ?>
                <script type="text/javascript" rel="javascript"> activar();</script>
                <div id="contenido">
                    <p><strong>Sistema Gestión Alumnos Web</strong></p>
                  
                </div>
            </div>
        </div>      
        </main>
         <?php require_once 'secciones/footer.php'; ?>
   
    </body>
</html>

