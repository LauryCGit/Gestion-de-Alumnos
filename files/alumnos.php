<?php require_once 'secret.php';?>
<!DOCTYPE html>
<html>
    <head>
        <title>Alumnos - Sistema</title>
        <?php require_once 'secciones/head.php'; ?>
        <script defer src="js/valida_alumno.js" type="text/javascript"></script>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" rel="javascript">
            function activar(){
                let link = document.getElementById("menuA");
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
                        <div class=""><a href="files/index.php">Inicio</a>/
                            Alumnos</div>
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
                        <div class="row justify-content-start ">
                            <div id="divSugestivo" class="input-group mb-1 col-10" style="position: relative;">
                                <input id="textSugestivo" class="form-control col-6" type="text" placeholder="Ingrese apellido de alumno.."/>
                                <!--<button class="btn btn-secondary col-1" type=""><a href="files/alumnos_consulta.php">Buscar</a></button>-->
                                <button class="btn btn-info col" type=""><a href="files/alumnos_alta.php">Nuevo Alumno</a></button>
                                <button class="btn btn-secondary col" type="button" onclick="alumno.listar()">Listar Alumnos</button>
                            </div>
                        </div>
                        <div>
                            <hr>
                            <table style="visibility: hidden;" id="listaU" class="hidden table table-bordered table-sm table-hover col-lg-11 text-center" >
                                <thead class="">
                                    <tr >
                                        <th scope="row">Apellido</th>
                                        <th>Nombre</th>
                                        <th>DNI</th>
                                        <th>Correo Electrónico</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyU">
                                    
                                </tbody>
                                <tfoot id="tfootU">
                                    
                                </tfoot>
                             </table>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php require_once 'secciones/footer.php'; ?>
    </body>
</html>
