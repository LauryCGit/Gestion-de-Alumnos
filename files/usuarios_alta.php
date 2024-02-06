<?php require_once 'secret.php';?>
<!DOCTYPE html>
<html>
    <head>
        <title>Usuarios Alta - Sistema</title>
        <?php require_once 'secciones/head.php'; ?>
        <script defer src="js/valida_alta.js" type="text/javascript"></script>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" rel="javascript">
            function activar(){
                let link = document.getElementById("menuU");
                link.setAttribute("class","nav-link active");
            }
        </script> 
    </head>
    <body>
        <header>
             <h1>Gestión Alumnos Web</h1>
        </header>
        <main>
            <div class="card">
                <div class="card-header text-center">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <a href="files/index.php">Inicio</a>/
                            <a href="files/usuarios.php">Usuarios</a>/Alta de Usuarios</div>
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
                        <h5>Agregar Nuevo Usuario</h5>
                        <div id="idalerta" hidden class="alert alert-success alert-dismissible col-7" role="alert">
                                                        
                        </div>
                        
                        <form id="formU" action="" method="" autocomplete="off">
                            <div class="form-group mx-2 form-inline">
                                <label for="campoName">Nombre</label>
                                <input type="text" class="form-control mx-2" name="campoName" id="campoName" placeholder="Nombres" minlength=0 maxlength=60 >
                                <small style="visibility: hidden;" id="msj1"></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoAp">Apellido</label>
                                <input type="text" class="form-control mx-2" name="campoAp" id="campoAp" placeholder="Apellido" minlength=0 maxlength=60>
                                <small style="visibility: hidden;" id="msj2" ></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoNU">Nombre de Usuario</label>
                                <input type="text" class="form-control mx-2"  name="campoNU" id="campoNU" placeholder="Usuario" minlength=6 maxlength=30>
                                <small style="visibility: hidden;" id="msj3" ></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoPass">Contraseña</label>
                                <input type="password" class="form-control mx-2" name="campoPass" id="campoPass" placeholder="Contraseña" minlength=8 maxlength=15>
                                <small style="visibility: hidden;" id="msj4" ></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoPass2">Confirme Contraseña</label>
                                <input type="password" class="form-control mx-2" name="campoPass2" id="campoPass2" placeholder="Confirme contraseña" minlength=8 maxlength=15>
                                <small style="visibility: hidden;" id="msj5"></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoMail">Correo Electrónico</label>
                                <input type="email" class="form-control mx-2" name="campoMail" id="campoMail" placeholder="Correo electrónico" minlength=4 maxlength=120>
                                <small style="visibility: hidden;" id="msj6"></small>
                            </div>
                            <div class="form-group mx-2 form-inline">
                                <label for="campoMail2">Confirme Correo Electrónico</label>
                                <input type="email" class="form-control mx-2" name="campoMail2" id="campoMail2" placeholder="Confirme correo electrónico" minlength=4 maxlength=120>
                                <small style="visibility: hidden;" id="msj7"></small>
                            </div>
                            
                            <div  id="botones" class="text-center col-8">
                                <button type="button" class="btn btn-info col-2" onclick="valta()">Agregar</button>
                                <button type="reset" class="btn btn-secondary col-2" onclick="usuario.resetearAlta()">Limpiar</button>
                            </div>
                         </form>
                    </div>
                </div>
                
            </div>   
        </main>
         <?php require_once 'secciones/footer.php'; ?>   
    </body>
</html>